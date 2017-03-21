<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class PaymentType extends ActionAbstract implements ActionInterface
{
    public function add($args)
    {
        $this->action = 'PAYMENTTYPEADD';
        $queryParamKeys = [
            'PAYMENTSYSTEM', 'NAME', 'STATUS', 'INSTALLMENTS', 'INTERESTRATE', 'DISCOUNTRATE','COMMISSIONRATE',
            'VALIDFROM', 'VALIDTO', 'APPLYFORDEBITCREDITCARD', 'APPLYFORCREDITCARD', 'APPLYFORBUSINESSCARD'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'PAYMENTTYPEEDIT';
        $queryParamKeys = [
            'PAYMENTSYSTEM', 'NAME', 'STATUS', 'INSTALLMENTS', 'INTERESTRATE', 'DISCOUNTRATE','COMMISSIONRATE',
            'VALIDFROM', 'VALIDTO', 'APPLYFORDEBITCREDITCARD', 'APPLYFORCREDITCARD', 'APPLYFORBUSINESSCARD'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function enable($args)
    {
        $this->action = 'PAYMENTTYPEENABLE';
        $queryParamKeys = [
            'PAYMENTSYSTEMTYPE', 'INSTALLMENTS'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function disable($args)
    {
        $this->action = 'PAYMENTTYPEDISABLE';
        $queryParamKeys = [
            'PAYMENTSYSTEMTYPE', 'INSTALLMENTS'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
