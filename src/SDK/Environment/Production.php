<?php


namespace MerchantSafeUnipay\SDK\Environment;

final class Production extends EnvironmentAbstract implements EnvironmentInterface
{
    static protected $apiUrl = 'https://merchantsafeunipay.com/msu/api/v2';
}
