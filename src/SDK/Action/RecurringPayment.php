<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class RecurringPayment extends ActionAbstract implements ActionInterface
{
    static private $editKeys = [
        'RECURRINGPLANCODE', 'RECURRENCE', 'AMOUNT', 'RECURRINGPAYMENTSTATUS'
    ];

    public function edit($args)
    {
        $this->action = 'RECURRINGPAYMENTEDIT';
        $args = MerchantSafeUnipay\filter(self::$editKeys, $args);
        $this->queryParameters = $args;
    }
}
