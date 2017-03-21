<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class Merchant extends ActionAbstract implements ActionInterface
{

    public function enable($args)
    {
        $this->action = 'MERCHANTENABLE';
        $queryParamKeys = [
            'MERCHANTBUSINESSID'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function disable($args)
    {
        $this->action = 'MERCHANTDISABLE';
        $queryParamKeys = [
            'MERCHANTBUSINESSID'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
