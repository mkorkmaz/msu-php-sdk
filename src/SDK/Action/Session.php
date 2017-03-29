<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class Session extends ActionAbstract implements ActionInterface
{
    static private $sessionTokenKeys = [
        'CUSTOMER', 'SESSIONTYPE', 'RETURNURL', 'MERCHANTPAYMENTID', 'AMOUNT', 'CURRENCY', 'CUSTOMEREMAIL',
        'CUSTOMERNAME', 'CUSTOMERPHONE', 'CUSTOMERIP', 'CUSTOMERUSERAGENT', 'SESSIONEXPIRY', 'LANGUAGE',
        'CAMPAIGNCODE', 'ORDERITEMS', 'TMXSESSIONQUERYINPUT', 'EXTRA', 'MAXINSTALLMENTCOUNT', 'SPLITPAYMENTTYPE'
    ];
    static private $sessionExtendKeys = [
        'TOKEN', 'SESSIONEXPIRY'
    ];

    public function sessionToken($args)
    {
        $this->action = 'SESSIONTOKEN';
        $args = MerchantSafeUnipay\filter(self::$sessionTokenKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function sessionExtend($args)
    {
        $this->action = 'SESSIONEXTEND';
        $args = MerchantSafeUnipay\filter(self::$sessionExtendKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }
}
