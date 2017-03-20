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
            'CUSTOMER', 'AMOUNT', 'CURRENCY', 'CUSTOMEREMAIL', 'CUSTOMERNAME', 'CUSTOMERIP',
            'CARDHOLDERPORT', 'CUSTOMERUSERAGENT', 'CARDTOKEN', 'CARDPAN', 'CARDEXPIRY',
            'NAMEONCARD', 'CARDCVV', 'CUSTOMERPHONE', 'SAVECARD', 'ISREFUNDABLE', 'CARDSAVENAME',
            'INSTALLMENTS', 'PAYMENTSYSTEM', 'POINTS', 'CAMPAIGNS', 'BILLTOADDRESSLINE', 'BILLTOCITY',
            'BILLTOPOSTALCODE', 'BILLTOCOUNTRY', 'SHIPTOADDRESSLINE', 'SHIPTOCITY', 'SHIPTOPOSTALCODE',
            'SHIPTOCOUNTRY', 'THREATMETRIXSESSIONID', 'TMXSESSIONQUERYINPUT', 'EXTRA',
            'DEALERCODE', 'FORGROUP'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function preAuth($args)
    {
        $this->action = 'PREAUTH';
    }

    public function postAuth($args)
    {
        $this->action = 'POSTAUTH';
    }

    public function void($args)
    {
        $this->action = 'VOID';
    }

    public function refund($args)
    {
        $this->action = 'REFUND';
    }
}
