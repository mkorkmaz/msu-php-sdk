<?php declare(strict_types=1);

/**
 * @package MerchantSafeUnipay\SDK
 * @author Mehmet Korkmaz <mehmet@mkorkmaz.com>
 * @licence https://opensource.org/licenses/mit-license.php MIT
 *
 * Documentation can be found at https://merchantsafeunipay.com/msu/api/v2/doc
 */

namespace MerchantSafeUnipay\SDK;

use GuzzleHttp;
use GuzzleHttp\Client as GuzzleClient;
use MerchantSafeUnipay\SDK\Environment\EnvironmentInterface as Environment;
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
        'dealerPST',
        'dealerType',
        'eWallet',
        'merchant',
        'merchantUser',
        'merchantContent',
        'messageContent',
        'payByLinkPayment',
        'paymentPolicy',
        'paymentSystem',
        'paymentType',
        'recurringPayment',
        'recurringPlan',
        'recurringPlanCard',
        'query',

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
     * @var array
     */
    private static $possibleResponses = [
        '00' => 'Approved',
        '01' => 'Waiting for Approval',
        '98' => 'General Error',
        '99' => 'Declined'
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
        $action = $this->getAction($name, $arguments);
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
     * @param string $name
     * @param array $arguments
     * @return ActionInterface
     * @throws BadMethodCallException
     * @throws InvalidArgumentException
     */
    private function getAction(string $name, array $arguments)
    {
        $actionClass =  '\\MerchantSafeUnipay\\SDK\\Action\\'. ucfirst($name);

        if (!in_array($name, self::$validActions, true) || !class_exists($actionClass)) {
            $message = sprintf('%s is not valid MerchantSafeUnipay API action.', $name);
            throw new BadMethodCallException($message);
        }
        $actionName = $arguments[0];
        $actionObject = new $actionClass($this->environment->getMerchantData());
        if (!method_exists($actionObject, $actionName)) {
            $message = sprintf(
                '%s/%s is not valid MerchantSafeUnipay API action.',
                ucfirst($name),
                ucfirst($actionName)
            );
            throw new BadMethodCallException($message);
        }
        try {
            $actionObject->$actionName($arguments[1]);
            return $actionObject;
        } catch (TypeError $e) {
            $message = 'This action needs arguments, no argument provided.';
            throw new InvalidArgumentException($message);
        }
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
