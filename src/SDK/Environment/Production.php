<?php


namespace MerchantSafeUnipay\SDK\Environment;

class Production extends EnvironmentAbstract implements EnvironmentInterface
{
    static protected $apiUrl = 'https://merchantsafeunipay.com/msu/api/v2';
}
