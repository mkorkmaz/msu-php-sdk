<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class RecurringPayment extends ActionAbstract implements ActionInterface
{
    public function edit($args)
    {
        $this->action = 'RECURRINGPAYMENTEDIT';
        $queryParamKeys = [
            'RECURRINGPLANCODE', 'RECURRENCE', 'AMOUNT', 'RECURRINGPAYMENTSTATUS'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
