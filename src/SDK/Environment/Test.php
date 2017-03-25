<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Environment;

final class Test extends EnvironmentAbstract implements EnvironmentInterface
{
    static protected $apiUrl = 'https://test.merchantsafeunipay.com/msu/api/v2';
}
