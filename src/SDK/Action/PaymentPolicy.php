<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class PaymentPolicy extends ActionAbstract implements ActionInterface
{
    static private $addKeys = [
        'PAYMENTSYSTEM', 'PPOLICY', 'CURRENCY', 'AMOUNTLIMIT'
    ];
    static private $editKeys = [
        'PAYMENTSYSTEM', 'PPOLICY', 'CURRENCY', 'AMOUNTLIMIT'
    ];

    public function add($args)
    {
        $this->action = 'PAYMENTPOLICYADD';
        $args = MerchantSafeUnipay\filter(self::$addKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function edit($args)
    {
        $this->action = 'PAYMENTPOLICYEDIT';
        $args = MerchantSafeUnipay\filter(self::$editKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }
}
