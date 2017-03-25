<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class RejectActions extends ActionAbstract implements ActionInterface
{

    public function rejectTransaction($args)
    {
        $this->action = 'REJECTTRANSACTION';
        $queryParamKeys = [
            'MERCHANTPAYMENTID'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
