<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK;

use Monolog\ErrorHandler;
use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\ErrorLogHandler;
use GuzzleHttp;
use MerchantSafeUnipay\SDK\Client;
use MerchantSafeUnipay\SDK\Exception\InvalidArgumentException;

final class ClientBuilder
{
    private $environment;
    private $logger;


    public static function create()
    {
        return new static();
    }

    public function setEnvironment(
        string $apiUrl,
        string $merchant,
        string $merchantUser,
        string $merchantPassword
    ) {
        $this->environment = new Environment($apiUrl, $merchant, $merchantUser, $merchantPassword);
        return $this;
    }

    public function setLogger($logger = null)
    {
        if ($logger instanceof LoggerInterface) {
            $this->logger = $logger;
            return $this;
        }
        $this->logger = $this->getLogger();
        return $this;
    }
    private function getLogger()
    {

        $log = new Logger('MerchantSafeUnipayPhpSDK');
        $log->pushHandler(new ErrorLogHandler(ErrorLogHandler::OPERATING_SYSTEM, Logger::WARNING));
        return $log;
    }

    public function build()
    {
        if ($this->logger === null) {
            $this->logger = $this->getLogger();
        }
        return new Client($this->environment, new GuzzleHttp\Client(), $this->logger);
    }
}
