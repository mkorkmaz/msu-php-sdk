<?php declare(strict_types=1);

/**
 * @package MerchantSafeUnipay\SDK
 * @author Mehmet Korkmaz <mehmet@mkorkmaz.com>
 * @license https://opensource.org/licenses/mit-license.php MIT
 *
 * Documentation can be found at https://merchantsafeunipay.com/msu/api/v2/doc
 */

namespace MerchantSafeUnipay\SDK;

use GuzzleHttp\Client as GuzzleClient;
use function MerchantSafeUnipay\convertSnakeCase;
use MerchantSafeUnipay\SDK\Environment;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use MerchantSafeUnipay\SDK\Action\ActionInterface;
use Psr7\Http\Message\RequestInterface;
use MerchantSafeUnipay\SDK\Exception\InvalidArgumentException;
use MerchantSafeUnipay\SDK\Exception\BadMethodCallException;
use MerchantSafeUnipay\SDK\Exception\RequestException;

class Client
{
    /**
     *
     */
    const MSU_API_VERSION = 2;

    /**
     * @var array
     */
    private static $validActions = [

        'session',
        'financialTransactions',
        'approveActions',
        'rejectActions',
        'dealer',
        'dealerPst',
        'dealerType',
        'eWallet',
        'merchant',
        'merchantUser',
        'messageContent',
        'payByLinkPayment',
        'paymentPolicy',
        'paymentSystem',
        'paymentType',
        'recurringPayment',
        'recurringPlan',
        'recurringPlanCard'
    ];

    private static $validQueryActions = [
        'Transaction',
        'DealerTransaction',
        'SubDealerTransaction',
        'Installment',
        'Card',
        'CardExpiry',
        'Customer',
        'Session',
        'PayByLinkPayment',
        'Bin',
        'Campaign',
        'OnlineCampaign',
        'RecurringPlan',
        'PaymentSystems',
        'MerchantPaymentSystems',
        'MerchantProfile',
        'PaymentSystemData',
        'Points',
        'PaymentPolicy',
        'SplitPayment',
        'Merchant',
        'MerchantContent',
        'MerchantStatusHistory',
        'MerchantUser',
        'UserRolePermission',
        'Dealer',
        'DealerType',
        'DealerPst',
        'DealerStatusHistory',
        'MerchantUserDealers',
        'Groups',
        'ExecutiveReport',
        'TransactionRule'
    ];

    /**
     * @var Environment
     */
    private $environment;
    /**
     * @var GuzzleClient
     */
    private $guzzleClient;

    private $logger;

    private static $headers = [
        'User-Agent' => 'MerchantSafeUnipayPhpSDK/1.0',
        'Accept'     => 'application/json'
    ];

    /**
     * Client constructor.
     * @param Environment $environment
     * @param GuzzleClient $guzzleClient
     * @param LoggerInterface $logger
     */
    public function __construct(Environment $environment, GuzzleClient $guzzleClient, LoggerInterface $logger)
    {
        $this->environment = $environment;
        $this->guzzleClient = $guzzleClient;
        $this->logger = $logger;
    }

    /**
     * @param $name
     * @param $arguments
     * @throws BadMethodCallException
     * @throws RequestException
     * @throws InvalidArgumentException
     * @return array
     */
    public function __call(string $name, array $arguments)
    {
        return $this->requestAction($this->getCallAction($name, $arguments));
    }

    /**
     * @param $name
     * @param $arguments
     * @throws BadMethodCallException
     * @throws RequestException
     * @throws InvalidArgumentException
     * @return array
     */
    public function query(string $name, array $arguments)
    {
        return $this->requestAction($this->getQueryAction($name, $arguments));
    }

    private function getCallAction(string $name, array $arguments)
    {
        $namespace = '\\MerchantSafeUnipay\\SDK\\Action';
        $actionClass =  $namespace . '\\'. convertSnakeCase($name);
        if (!in_array($name, self::$validActions, true) || !class_exists($actionClass)) {
            $message = sprintf('%s is not valid MerchantSafeUnipay API action.', $name);
            throw new BadMethodCallException($message);
        }
        return $this->actionFactory($name, $arguments, $namespace);
    }
    private function getQueryAction(string $name, array $arguments)
    {
        $name = str_replace(' ', '', ucwords(str_replace('_', '', $name)));
        $namespace = '\\MerchantSafeUnipay\\SDK\\Action\\Query';
        $actionClass =  $namespace . '\\'. convertSnakeCase($name);
        if (!in_array($name, self::$validQueryActions, true) || !class_exists($actionClass)) {
            $message = sprintf('%s is not valid MerchantSafeUnipay API query action.', $name);
            throw new BadMethodCallException($message);
        }
        return $this->actionFactory($name, ['getQuery', $arguments], $namespace);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @param string $namespace
     * @return ActionInterface
     * @throws BadMethodCallException
     * @throws InvalidArgumentException
     */
    private function actionFactory(string $name, array $arguments, string $namespace)
    {
        $actionClass =  $namespace . '\\'. convertSnakeCase($name);
        $actionName = $arguments[0];
        $actionMethod = convertSnakeCase($actionName, 'f');
        $actionObject = new $actionClass($this->environment->getMerchantData());
        if (!method_exists($actionObject, $actionMethod)) {
            $message = sprintf(
                '%s/%s is not valid MerchantSafeUnipay API action.',
                ucfirst($name),
                ucfirst($actionName)
            );
            throw new BadMethodCallException($message);
        }
        try {
            $actionObject->$actionMethod($arguments[1]);
            return $actionObject;
        } catch (TypeError $e) {
            $message = 'This action needs arguments, no argument provided.';
            throw new InvalidArgumentException($message);
        }
    }

    private function requestAction(ActionInterface $action)
    {
        $headers = array_merge(self::$headers, $action->getHeaders());
        $response = $this->httpRequest($action->getAction(), $headers, $action->getQueryParams());

        return [
            'status' => $response->getStatusCode(),
            'reason' => $response->getReasonPhrase(),
            'headers' => $response->getHeaders(),
            'data' => json_decode((string) $response->getBody(), true)
        ];
    }

    /**
     * @param string $actionName
     * @param array $headers
     * @param array  $queryParams
     * @throws RequestException
     * @return ResponseInterface
     */
    private function httpRequest(string $actionName, array $headers, array $queryParams)
    {
        $uri = $this->environment->getUrl();
        $queryParams['ACTION'] = $actionName;
        $options = [
            'headers' => $headers,
            'form_params' => $queryParams
        ];
        try {
            return $this->guzzleClient->post($uri, $options);
        } catch (Exception $e) {
            $message =   $e->getMessage();
        }
        $message = sprintf('MerchantSafe Unipay API Request Error:% s', $message);
        throw new RequestException($message);
    }
}
