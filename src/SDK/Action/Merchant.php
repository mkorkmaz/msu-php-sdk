<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class Merchant extends ActionAbstract implements ActionInterface
{
    static private $enableKeys = [
        'MERCHANTBUSINESSID'
    ];
    static private $disableKeys = [
        'MERCHANTBUSINESSID'
    ];

    public function enable($args)
    {
        $this->action = 'MERCHANTENABLE';
        $args = MerchantSafeUnipay\filter(self::$enableKeys, $args);
        $this->queryParameters = $args;
    }

    public function disable($args)
    {
        $this->action = 'MERCHANTDISABLE';
        $args = MerchantSafeUnipay\filter(self::$disableKeys, $args);
        $this->queryParameters = $args;
    }
}
