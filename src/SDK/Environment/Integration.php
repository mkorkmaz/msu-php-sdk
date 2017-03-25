<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Environment;

final class Integration extends EnvironmentAbstract implements EnvironmentInterface
{
    static protected $apiUrl = 'https://entegrasyon.asseco-see.com.tr/msu/api/v2';
}
