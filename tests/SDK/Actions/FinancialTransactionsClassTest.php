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
                'https://test.merchantsafeunipay.com/msu/api/v2',
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
            'CARDPAN' => '5571135571135575',
            'CARDEXPIRY' => '12.30',
            'NAMEONCARD' => 'AKBANK-MASTER',
            'CARDCVV' => '000'
        ];
        $ftResponse = $this->client->financialTransactions('sale', $args);
        $this->assertArrayHasKey('pgTranId', $ftResponse['data']);
        $this->assertArrayHasKey('responseCode', $ftResponse['data']);
        $this->assertEquals('00', $ftResponse['data']['responseCode'], 'Sale should have been successful');

        $args = [
            'PGTRANID '=> $ftResponse['data']['pgTranId']
        ];
        $qResponse = $this->client->query('transaction', $args);
        $this->assertArrayHasKey('responseCode', $qResponse['data']);
        $this->assertEquals('00', $qResponse['data']['responseCode'], 'Query should have been successful');
        $args = [
            'AMOUNT' => 1.0,
            'CURRENCY' => 'TRY',
            'PGTRANID'=> $ftResponse['data']['pgTranId']
        ];
        $rResponse = $this->client->financialTransactions('refund', $args);
        $this->assertArrayHasKey('responseCode', $rResponse['data']);
        $this->assertEquals('00', $rResponse['data']['responseCode'], 'Refund should have been successful');
    }

    /**
     * @test
     */
    public function shouldHandlePrePostAuthSuccessfully()
    {
        $args = [
            'MERCHANTPAYMENTID' => date('Ymdhis'),
            'CUSTOMER' => '1',
            'AMOUNT' => 1.0,
            'CURRENCY' => 'TRY',
            'CUSTOMEREMAIL' => 'mehmet@mkorkmaz.com',
            'CUSTOMERNAME' => 'Mehmet Korkmaz',
            'CUSTOMERIP'    => '127.0.0.1',
            'CARDPAN' => '5571135571135575',
            'CARDEXPIRY' => '12.30',
            'NAMEONCARD' => 'AKBANK-MASTER',
            'CARDCVV' => '000'
        ];
        $paResponse = $this->client->financialTransactions('preAuth', $args);
        $this->assertArrayHasKey('pgTranRefId', $paResponse['data']);
        $this->assertArrayHasKey('responseCode', $paResponse['data']);
        $this->assertEquals('00', $paResponse['data']['responseCode'], 'PreAuth should have been successful');
        $args = [
            'PGTRANID' => $paResponse['data']['pgTranId'],
            'AMOUNT' => 10.0
        ];
        $psaResponse = $this->client->financialTransactions('postAuth', $args);
        $this->assertArrayHasKey('responseCode', $psaResponse['data']);
        $this->assertEquals('99', $psaResponse['data']['responseCode'], 'PreAuth should have been failed');
        $args = [
            'PGTRANID' => $paResponse['data']['pgTranId'],
            'AMOUNT' => 1.0
        ];
        $psa2Response = $this->client->financialTransactions('postAuth', $args);
        $this->assertArrayHasKey('responseCode', $psa2Response['data']);
        $this->assertEquals('00', $psa2Response['data']['responseCode'], 'PreAuth should have been successful');
    }

    /**
     * @test
     */
    public function shouldHandleVoidSuccessfully()
    {
        $args = [
            'MERCHANTPAYMENTID' => date('Ymdhis'),
            'CUSTOMER' => '1',
            'AMOUNT' => 1.0,
            'CURRENCY' => 'TRY',
            'CUSTOMEREMAIL' => 'mehmet@mkorkmaz.com',
            'CUSTOMERNAME' => 'Mehmet Korkmaz',
            'CUSTOMERIP'    => '127.0.0.1',
            'CARDPAN' => '5571135571135575',
            'CARDEXPIRY' => '12.30',
            'NAMEONCARD' => 'AKBANK-MASTER',
            'CARDCVV' => '000'
        ];
        $sResponse = $this->client->financialTransactions('sale', $args);
        $this->assertArrayHasKey('pgTranId', $sResponse['data']);
        $this->assertArrayHasKey('responseCode', $sResponse['data']);
        $this->assertEquals('00', $sResponse['data']['responseCode'], 'Sale should have been successful');
        $args = [
            'PGTRANID' => $sResponse['data']['pgTranId']
        ];
        $vResponse = $this->client->financialTransactions('void', $args);
        $this->assertArrayHasKey('responseCode', $vResponse['data']);
        $this->assertEquals('00', $vResponse['data']['responseCode'], 'Void should have been successfuld');
    }
}
