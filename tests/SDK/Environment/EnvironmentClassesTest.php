<?php
declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;
use MerchantSafeUnipay\SDK\Environment;

class EnvironmentClassesTest extends TestCase
{
    static protected $merchantData = [
        'merchant' => 'MKorkmaz',
        'merchantUsername' => 'MKorkmazUserName',
        'merchantPassword' => 'Passwd',
    ];

    static protected $apiTestUrl = 'https://test.merchantsafeunipay.com/msu/api/v2';
    static protected $apiIntegrationUrl = 'https://entegrasyon.asseco-see.com.tr/msu/api/v2';
    static protected $apiProductionUrl = 'https://merchantsafeunipay.com/msu/api/v2';


    protected $testEnv;
    protected $productionEnv;

    public function setUp()
    {
        $this->testEnv = new Environment\Test(
            self::$merchantData['merchant'],
            self::$merchantData['merchantUsername'],
            self::$merchantData['merchantPassword']
        );

        $this->productionEnv = new Environment\Production(
            self::$merchantData['merchant'],
            self::$merchantData['merchantUsername'],
            self::$merchantData['merchantPassword']
        );
    }


    /**
     * @test
     */
    public function shouldReturnTestUrlSuccessfully()
    {
        $this->assertEquals(self::$apiTestUrl, $this->testEnv->getUrl());
    }


    /**
     * @test
     */
    public function shouldReturnProductionUrlSuccessfully()
    {
        $this->assertEquals(self::$apiProductionUrl, $this->productionEnv->getUrl());
    }


    /**
     * @test
     */
    public function shouldReturnMerchantDataSuccessfully()
    {
        $merchantData = $this->testEnv->getMerchantData();

        $this->assertArrayHasKey('MERCHANT', $merchantData);
        $this->assertArrayHasKey('MERCHANTUSER', $merchantData);
        $this->assertArrayHasKey('MERCHANTPASSWORD', $merchantData);

        $this->assertEquals(self::$merchantData['merchant'], $merchantData['MERCHANT']);
        $this->assertEquals(self::$merchantData['merchantUsername'], $merchantData['MERCHANTUSER']);
        $this->assertEquals(self::$merchantData['merchantPassword'], $merchantData['MERCHANTPASSWORD']);
    }
}
