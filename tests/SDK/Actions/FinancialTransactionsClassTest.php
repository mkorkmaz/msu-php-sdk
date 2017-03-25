<?php
declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;

use MerchantSafeUnipay\SDK\ClientBuilder;

class FinancialTransactionsClassTest extends TestCase
{

    protected $client;

    public function setUp()
    {
        $envFile = dirname(__DIR__, 2) . '/environments.php';
        if (file_exists($envFile)) {
            include($envFile);
        } else {
            $MSUPHPSDK_M = getenv('MSUPHPSDK_M');
            $MSUPHPSDK_U = getenv('MSUPHPSDK_U');
            $MSUPHPSDK_P = getenv('MSUPHPSDK_P');
        }
        $this->client = ClientBuilder::create()
            ->setEnvironment(
                'test',
                $MSUPHPSDK_M,
                $MSUPHPSDK_U,
                $MSUPHPSDK_P
            )
            ->build();
    }

    /**
     * @test
     */

    public function shouldMakeSaleSuccessfully()
    {
        $args = [
            'MERCHANTPAYMENTID' => date('Ymdhis'),
            'CUSTOMER' => '1',
            'AMOUNT' => 1.0,
            'CURRENCY' => 'TRY',
            'CUSTOMEREMAIL' => 'mehmet@mkorkmaz.com',
            'CUSTOMERNAME' => 'Mehmet Korkmaz',
            'CUSTOMERIP'    => '127.0.0.1',
            'CARDPAN' => '5406675406675403',
            'CARDEXPIRY' => '12.30',
            'NAMEONCARD' => 'ISBANK-MASTER',
            'CARDCVV' => '000'
        ];
        $response = $this->client->financialTransactions('sale', $args);
        $this->assertArrayHasKey('pgTranId', $response['data']);
        $this->assertArrayHasKey('responseCode', $response['data']);
        $this->assertEquals('00', $response['data']['responseCode']);



        $args = [
            'PGTRANID '=> $response['data']['pgTranId']
        ];
        $response = $this->client->query('transaction', $args);
        $this->assertArrayHasKey('responseCode', $response['data']);
        $this->assertEquals('00', $response['data']['responseCode']);
    }
}
