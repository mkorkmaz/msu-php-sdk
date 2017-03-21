<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class PaymentSystem extends ActionAbstract implements ActionInterface
{
    public function add($args)
    {
        $this->action = 'PAYMENTSYSTEMADD';
        $queryParamKeys = [
            'PAYMENTSYSTEM', 'PAYMENTSYSTEMTYPE', 'STATUS', 'PAYMENTSYSTEMMODE', 'APIMERCHANTID', 'APIUSERNAME',
            'APIPASSWORD', 'GATE3DKEY', 'INTEGRATIONEXTRAFIELD00', 'INTEGRATIONEXTRAFIELD01', 'ISDEFAULT',
            'SUBMERCHANTCODE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'PAYMENTSYSTEMEDIT';
        $queryParamKeys = [
            'PAYMENTSYSTEMTYPE', 'PAYMENTSYSTEM', 'STATUS', 'PAYMENTSYSTEMMODE', 'APIMERCHANTID', 'APIUSERNAME',
            'APIPASSWORD', 'GATE3DKEY', 'INTEGRATIONEXTRAFIELD00', 'INTEGRATIONEXTRAFIELD01', 'ISDEFAULT',
            'SUBMERCHANTCODE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function read($args)
    {
        $this->action = 'PAYMENTSYSTEMREAD';
        $queryParamKeys = [
            'PAYMENTSYSTEMTYPE', 'PAYMENTSYSTEM'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function enable($args)
    {
        $this->action = 'PAYMENTSYSTEMENABLE';
        $queryParamKeys = [
            'PAYMENTSYSTEMTYPE', 'PAYMENTSYSTEM'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function disable($args)
    {
        $this->action = 'PAYMENTSYSTEMDISABLE';
        $queryParamKeys = [
            'PAYMENTSYSTEMTYPE', 'PAYMENTSYSTEM'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
