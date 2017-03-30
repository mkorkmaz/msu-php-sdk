<?php
declare(strict_types=1);


namespace tests;

use PHPUnit\Framework\TestCase;
use MerchantSafeUnipay\SDK;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class ClientBuilderClassTest extends TestCase
{
    /**
     * @test
     * @param string $env
     * @param string $merchant
     * @param string $merchantUser
     * @param string $merchantPassword
     * @dataProvider environmentDataProvider
     */
    public function shouldReturnClientObjectSuccessfullyForDifferentEnvironments(
        $env,
        $merchant,
        $merchantUser,
        $merchantPassword
    ) {
        $client = SDK\ClientBuilder::create()
            ->setEnvironment($env, $merchant, $merchantUser, $merchantPassword)
            ->build();
        $this->assertInstanceOf(SDK\Client::class, $client);
    }

    public function environmentDataProvider()
    {
        return [
            ['https://test.merchantsafeunipay.com/msu/api/v2', 'm', 'mu', 'mp'],
            ['https://merchantsafeunipay.com/msu/api/v2', 'm', 'mu', 'mp']
        ];
    }

    /**
     * @test
     */
    public function shouldInstantiateClientObjectSuccessfullyForNullLogger()
    {
        $client = SDK\ClientBuilder::create()
            ->setEnvironment('test', 'm', 'mu', 'mp')
            ->setLogger()
            ->build();
        $this->assertInstanceOf(SDK\Client::class, $client);
    }

    /**
     * @test
     */
    public function shouldInstantiateClientObjectSuccessfullyForPredefinedLogger()
    {
        $logger = new Logger('name');
        $logger->pushHandler(new StreamHandler('path/to/your.log', Logger::WARNING));

        $client = SDK\ClientBuilder::create()
            ->setEnvironment('test', 'm', 'mu', 'mp')
            ->setLogger($logger)
            ->build();
        $this->assertInstanceOf(SDK\Client::class, $client);
    }
}
