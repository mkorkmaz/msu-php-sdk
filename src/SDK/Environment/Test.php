<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Environment;

class Test extends EnvironmentAbstract implements EnvironmentInterface
{
    private $apiUrl = 'https://test.merchantsafeunipay.com/msu/api/v2';
}
