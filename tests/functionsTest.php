<?php
declare(strict_types=1);


namespace tests;

use PHPUnit\Framework\TestCase;
use MerchantSafeUnipay;

class MyFunctions extends TestCase
{

    static protected $data = [
        'index_1' => 1,
        'index_2' => 2,
        'index_3' => 3,
        'index_4' => 4,
        'index_5' => 5,
    ];

    static protected $keys = [
        'index_1', 'index_2', 'index_4',
    ];


    /**
     * @test
     */

    public function shouldFilterDataSuccessfully()
    {
        $filteredData = MerchantSafeUnipay\filter(self::$keys, self::$data);
        $this->assertCount(3, $filteredData);
        $this->assertArrayHasKey('index_1', $filteredData);
        $this->assertArrayHasKey('index_2', $filteredData);
        $this->assertArrayHasKey('index_4', $filteredData);
        $this->assertEquals(1, $filteredData['index_1']);
        $this->assertEquals(2, $filteredData['index_2']);
        $this->assertEquals(4, $filteredData['index_4']);
    }


    /**
     * @test
     */

    public function shouldChangeCamelCaseSuccessfully()
    {
        $str = 'camelCaseString';
        $convertedString = MerchantSafeUnipay\convertCamelCase($str, '_');
        $this->assertEquals('camel_case_string', $convertedString);
        $convertedString = MerchantSafeUnipay\convertCamelCase($str, ' ');
        $this->assertEquals('camel case string', $convertedString);
    }
}
