<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class PayByLinkPayment extends ActionAbstract implements ActionInterface
{

    public function add($args)
    {
        $this->action = 'PAYBYLINKPAYMENT';
        $queryParamKeys = [
            'SESSIONEXPIRY', 'MERCHANTPAYMENTID', 'AMOUNT', 'CURRENCY', 'CUSTOMER', 'RETURNURL', 'CUSTOMEREMAIL',
            'CUSTOMERNAME', 'CUSTOMERPHONE', 'TCKN', 'LANGUAGE', 'ORDERITEMS'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function cancel($args)
    {
        $this->action = 'PAYBYLINKPAYMENTCANCEL';
        $queryParamKeys = [
            'PAYBYLINKTOKEN'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function resend($args)
    {
        $this->action = 'PAYBYLINKPAYMENTRESEND';
        $queryParamKeys = [
            'PAYBYLINKTOKEN'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
