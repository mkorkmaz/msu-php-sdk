<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class FinancialTransactions extends ActionAbstract implements ActionInterface
{

    public function sale($args)
    {
        $this->action = 'SALE';
        $queryParamKeys = [
            'MERCHANTPAYMENTID', 'CUSTOMER', 'AMOUNT', 'CURRENCY', 'CUSTOMEREMAIL', 'CUSTOMERNAME', 'CUSTOMERIP',
            'CARDHOLDERPORT', 'CUSTOMERUSERAGENT', 'CARDTOKEN', 'CARDPAN', 'CARDEXPIRY',
            'NAMEONCARD', 'CARDCVV', 'CUSTOMERPHONE', 'SAVECARD', 'ISREFUNDABLE', 'CARDSAVENAME',
            'INSTALLMENTS', 'PAYMENTSYSTEM', 'POINTS', 'CAMPAIGNS', 'BILLTOADDRESSLINE', 'BILLTOCITY',
            'BILLTOPOSTALCODE', 'BILLTOCOUNTRY', 'SHIPTOADDRESSLINE', 'SHIPTOCITY', 'SHIPTOPOSTALCODE',
            'SHIPTOCOUNTRY', 'THREATMETRIXSESSIONID', 'TMXSESSIONQUERYINPUT', 'EXTRA',
            'DEALERCODE', 'FORGROUP'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function preAuth($args)
    {
        $this->action = 'PREAUTH';
        $queryParamKeys = [
            'MERCHANTPAYMENTID', 'CUSTOMER', 'CARDHOLDERPORT', 'CARDTOKEN', 'AMOUNT', 'CURRENCY', 'CARDPAN',
            'CARDEXPIRY', 'NAMEONCARD', 'CUSTOMEREMAIL', 'CUSTOMERNAME', 'CUSTOMERPHONE', 'CUSTOMERIP',
            'CUSTOMERUSERAGENT', 'INSTALLMENTS', 'PAYMENTSYSTEM','CARDCVV', 'SAVECARD', 'ISREFUNDABLE',
            'CARDSAVENAME', 'BILLTOADDRESSLINE', 'BILLTOCITY', 'BILLTOPOSTALCODE', 'BILLTOCOUNTRY',
            'SHIPTOADDRESSLINE', 'SHIPTOCITY', 'SHIPTOPOSTALCODE', 'SHIPTOCOUNTRY', 'THREATMETRIXSESSIONID',
            'TMXSESSIONQUERYINPUT', 'EXTRA', 'DEALERCODE', 'FORGROUP'

        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function postAuth($args)
    {
        $this->action = 'POSTAUTH';
        $queryParamKeys = [
            'MERCHANTPAYMENTID', 'PGTRANID', 'AMOUNT'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function void($args)
    {
        $this->action = 'VOID';
        $queryParamKeys = [
            'MERCHANTPAYMENTID', 'PGTRANID',
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function refund($args)
    {
        $this->action = 'REFUND';
        $queryParamKeys = [
            'AMOUNT', 'PGTRANID', 'CURRENCY', 'MERCHANTPAYMENTID', 'SUBSTATUS'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
