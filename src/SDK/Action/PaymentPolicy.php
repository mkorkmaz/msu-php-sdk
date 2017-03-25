<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class PaymentPolicy extends ActionAbstract implements ActionInterface
{
    public function add($args)
    {
        $this->action = 'PAYMENTPOLICYADD';
        $queryParamKeys = [
            'PAYMENTSYSTEM', 'PPOLICY', 'CURRENCY', 'AMOUNTLIMIT'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'PAYMENTPOLICYEDIT';
        $queryParamKeys = [
            'PAYMENTSYSTEM', 'PPOLICY', 'CURRENCY', 'AMOUNTLIMIT'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
