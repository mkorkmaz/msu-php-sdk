<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class RejectActions extends ActionAbstract implements ActionInterface
{
    static private $rejectTransactionKeys = [
        'MERCHANTPAYMENTID'
    ];

    public function rejectTransaction($args)
    {
        $this->action = 'REJECTTRANSACTION';
        $args = MerchantSafeUnipay\filter(self::$rejectTransactionKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }
}
