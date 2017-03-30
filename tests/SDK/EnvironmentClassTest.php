<?php
declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;
use MerchantSafeUnipay\SDK\Environment;

class EnvironmentClassTest extends TestCase
{
    static protected $apiUrl = 'https://test.merchantsafeunipay.com/msu/api/v2';
    static protected $merchantData = [
        'merchant' => 'MKorkmaz',
        'merchantUsername' => 'MKorkmazUserName',
        'merchantPassword' => 'Passwd',
    ];
    protected $environment;

    public function setUp()
    {
        $this->environment = new Environment(
            self::$apiUrl,
            self::$merchantData['merchant'],
            self::$merchantData['merchantUsername'],
            self::$merchantData['merchantPassword']
        );
    }

    /**
     * @test
     */
    public function shouldReturnApiUrlSuccessfully()
    {
        $this->assertEquals(self::$apiUrl, $this->environment->getUrl());
    }

    /**
     * @test
     */
    public function shouldReturnMerchantDataSuccessfully()
    {
        $merchantData = $this->environment->getMerchantData();
        $this->assertArrayHasKey('MERCHANT', $merchantData);
        $this->assertArrayHasKey('MERCHANTUSER', $merchantData);
        $this->assertArrayHasKey('MERCHANTPASSWORD', $merchantData);
        $this->assertEquals(self::$merchantData['merchant'], $merchantData['MERCHANT']);
        $this->assertEquals(self::$merchantData['merchantUsername'], $merchantData['MERCHANTUSER']);
        $this->assertEquals(self::$merchantData['merchantPassword'], $merchantData['MERCHANTPASSWORD']);
    }
}
