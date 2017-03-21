<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class Session extends ActionAbstract implements ActionInterface
{

    public function sessionToken($args)
    {
        $this->action = 'SESSIONTOKEN';
        $queryParamKeys = [
            'CUSTOMER', 'SESSIONTYPE', 'RETURNURL', 'MERCHANTPAYMENTID', 'AMOUNT', 'CURRENCY', 'CUSTOMEREMAIL',
            'CUSTOMERNAME', 'CUSTOMERPHONE', 'CUSTOMERIP', 'CUSTOMERUSERAGENT', 'SESSIONEXPIRY', 'LANGUAGE',
            'CAMPAIGNCODE', 'ORDERITEMS', 'TMXSESSIONQUERYINPUT', 'EXTRA', 'MAXINSTALLMENTCOUNT', 'SPLITPAYMENTTYPE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }


    public function sessionExtend($args)
    {
        $this->action = 'SESSIONTOKEN';
        $queryParamKeys = [
            'SESSIONTOKEN', 'TOKEN', 'SESSIONEXPIRY'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
