<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class PaymentSystem extends ActionAbstract implements ActionInterface
{
    static private $addKeys = [
        'PAYMENTSYSTEM', 'PAYMENTSYSTEMTYPE', 'STATUS', 'PAYMENTSYSTEMMODE', 'APIMERCHANTID', 'APIUSERNAME',
        'APIPASSWORD', 'GATE3DKEY', 'INTEGRATIONEXTRAFIELD00', 'INTEGRATIONEXTRAFIELD01', 'ISDEFAULT',
        'SUBMERCHANTCODE'
    ];
    static private $editKeys = [
        'PAYMENTSYSTEMTYPE', 'PAYMENTSYSTEM', 'STATUS', 'PAYMENTSYSTEMMODE', 'APIMERCHANTID', 'APIUSERNAME',
        'APIPASSWORD', 'GATE3DKEY', 'INTEGRATIONEXTRAFIELD00', 'INTEGRATIONEXTRAFIELD01', 'ISDEFAULT',
        'SUBMERCHANTCODE'
    ];
    static private $readKeys = [
        'PAYMENTSYSTEMTYPE', 'PAYMENTSYSTEM'
    ];
    static private $enableKeys = [
        'PAYMENTSYSTEMTYPE', 'PAYMENTSYSTEM'
    ];
    static private $disableKeys = [
        'PAYMENTSYSTEMTYPE', 'PAYMENTSYSTEM'
    ];

    public function add($args)
    {
        $this->action = 'PAYMENTSYSTEMADD';

        $args = MerchantSafeUnipay\filter(self::$addKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'PAYMENTSYSTEMEDIT';
        $args = MerchantSafeUnipay\filter(self::$editKeys, $args);
        $this->queryParameters = $args;
    }

    public function read($args)
    {
        $this->action = 'PAYMENTSYSTEMREAD';
        $args = MerchantSafeUnipay\filter(self::$readKeys, $args);
        $this->queryParameters = $args;
    }

    public function enable($args)
    {
        $this->action = 'PAYMENTSYSTEMENABLE';
        $args = MerchantSafeUnipay\filter(self::$enableKeys, $args);
        $this->queryParameters = $args;
    }

    public function disable($args)
    {
        $this->action = 'PAYMENTSYSTEMDISABLE';
        $args = MerchantSafeUnipay\filter(self::$disableKeys, $args);
        $this->queryParameters = $args;
    }
}
