<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Environment;

class Integration extends EnvironmentAbstract implements EnvironmentInterface
{
    static protected $apiUrl = 'https://entegrasyon.asseco-see.com.tr/msu/api/v2';
}
