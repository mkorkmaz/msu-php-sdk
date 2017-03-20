<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Environment;

interface EnvironmentInterface
{
    public function getUrl();
    public function getMerchantData();
}
