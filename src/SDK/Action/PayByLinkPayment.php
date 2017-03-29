<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class PayByLinkPayment extends ActionAbstract implements ActionInterface
{
    static private $addKeys = [
        'SESSIONEXPIRY', 'MERCHANTPAYMENTID', 'AMOUNT', 'CURRENCY', 'CUSTOMER', 'RETURNURL', 'CUSTOMEREMAIL',
        'CUSTOMERNAME', 'CUSTOMERPHONE', 'TCKN', 'LANGUAGE', 'ORDERITEMS'
    ];
    static private $cancelKeys = [
        'PAYBYLINKTOKEN'
    ];
    static private $resendKeys = [
        'PAYBYLINKTOKEN'
    ];

    public function add($args)
    {
        $this->action = 'PAYBYLINKPAYMENT';
        $args = MerchantSafeUnipay\filter(self::$addKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function cancel($args)
    {
        $this->action = 'PAYBYLINKPAYMENTCANCEL';
        $args = MerchantSafeUnipay\filter(self::$cancelKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function resend($args)
    {
        $this->action = 'PAYBYLINKPAYMENTRESEND';
        $args = MerchantSafeUnipay\filter(self::$resendKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }
}
