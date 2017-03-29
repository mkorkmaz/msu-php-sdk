<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class DealerPst extends ActionAbstract implements ActionInterface
{
    static private $addKeys = [
        'SUBMERCHANTCODE', 'PAYMENTSYSTEMTYPE', 'DEALERCODE'
    ];
    static private $editKeys = [
        'SUBMERCHANTCODE', 'PAYMENTSYSTEMTYPE', 'DEALERCODE'
    ];
    static private $deleteKeys = [
        'DEALERCODE', 'PAYMENTSYSTEMTYPE'
    ];

    public function add($args)
    {
        $this->action = 'DEALERPSTADD';
        $args = MerchantSafeUnipay\filter(self::$addKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function edit($args)
    {
        $this->action = 'DEALERPSTEDIT';
        $args = MerchantSafeUnipay\filter(self::$editKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function delete($args)
    {
        $this->action = 'DEALERPSTDELETE';
        $args = MerchantSafeUnipay\filter(self::$deleteKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }
}
