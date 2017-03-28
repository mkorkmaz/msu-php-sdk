<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class FinancialTransactions extends ActionAbstract implements ActionInterface
{
    static private $saleKeys = [
        'AMOUNT', 'BILLTOADDRESSLINE', 'BILLTOCITY', 'BILLTOCOUNTRY', 'BILLTOPOSTALCODE', 'CAMPAIGNS', 'CARDCVV',
        'CARDEXPIRY', 'CARDHOLDERPORT', 'CARDPAN', 'CARDSAVENAME', 'CARDTOKEN', 'CURRENCY', 'CUSTOMER', 'CUSTOMEREMAIL',
        'CUSTOMERIP', 'CUSTOMERNAME', 'CUSTOMERPHONE', 'CUSTOMERUSERAGENT', 'DEALERCODE', 'EXTRA', 'FORGROUP',
        'INSTALLMENTS', 'ISREFUNDABLE', 'MERCHANTPAYMENTID', 'NAMEONCARD', 'PAYMENTSYSTEM', 'POINTS', 'SAVECARD',
        'SHIPTOADDRESSLINE', 'SHIPTOCITY', 'SHIPTOCOUNTRY', 'SHIPTOPOSTALCODE', 'THREATMETRIXSESSIONID',
        'TMXSESSIONQUERYINPUT',
    ];
    static private $preAuthKeys = [
        'AMOUNT', 'BILLTOADDRESSLINE', 'BILLTOCITY', 'BILLTOCOUNTRY', 'BILLTOPOSTALCODE', 'CARDCVV', 'CARDEXPIRY',
        'CARDHOLDERPORT', 'CARDPAN', 'CARDSAVENAME', 'CARDTOKEN', 'CURRENCY', 'CUSTOMER', 'CUSTOMEREMAIL', 'CUSTOMERIP',
        'CUSTOMERNAME', 'CUSTOMERPHONE', 'CUSTOMERUSERAGENT', 'DEALERCODE', 'EXTRA', 'FORGROUP', 'INSTALLMENTS',
        'ISREFUNDABLE', 'MERCHANTPAYMENTID', 'NAMEONCARD', 'PAYMENTSYSTEM', 'SAVECARD', 'SHIPTOADDRESSLINE',
        'SHIPTOCITY', 'SHIPTOCOUNTRY', 'SHIPTOPOSTALCODE', 'THREATMETRIXSESSIONID', 'TMXSESSIONQUERYINPUT',
    ];
    static private $postAuthKeys = [
        'MERCHANTPAYMENTID', 'PGTRANID', 'AMOUNT'
    ];
    static private $voidKeys = [
        'MERCHANTPAYMENTID', 'PGTRANID',
    ];
    static private $refundKeys = [
        'AMOUNT', 'PGTRANID', 'CURRENCY', 'MERCHANTPAYMENTID', 'SUBSTATUS'
    ];
    public function sale($args)
    {
        $this->action = 'SALE';
        $args = MerchantSafeUnipay\filter(self::$saleKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function preAuth($args)
    {
        $this->action = 'PREAUTH';
        $args = MerchantSafeUnipay\filter(self::$preAuthKeys, $args);
        $this->queryParameters = $args;
    }

    public function postAuth($args)
    {
        $this->action = 'POSTAUTH';
        $args = MerchantSafeUnipay\filter(self::$postAuthKeys, $args);
        $this->queryParameters = $args;
    }

    public function void($args)
    {
        $this->action = 'VOID';
        $args = MerchantSafeUnipay\filter(self::$voidKeys, $args);
        $this->queryParameters = $args;
    }

    public function refund($args)
    {
        $this->action = 'REFUND';
        $args = MerchantSafeUnipay\filter(self::$refundKeys, $args);
        $this->queryParameters = $args;
    }
}
