<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class PaymentType extends ActionAbstract implements ActionInterface
{
    static private $addKeys = [
        'PAYMENTSYSTEM', 'NAME', 'STATUS', 'INSTALLMENTS', 'INTERESTRATE', 'DISCOUNTRATE','COMMISSIONRATE',
        'VALIDFROM', 'VALIDTO', 'APPLYFORDEBITCREDITCARD', 'APPLYFORCREDITCARD', 'APPLYFORBUSINESSCARD'
    ];
    static private $editKeys = [
        'PAYMENTSYSTEM', 'NAME', 'STATUS', 'INSTALLMENTS', 'INTERESTRATE', 'DISCOUNTRATE','COMMISSIONRATE',
        'VALIDFROM', 'VALIDTO', 'APPLYFORDEBITCREDITCARD', 'APPLYFORCREDITCARD', 'APPLYFORBUSINESSCARD'
    ];
    static private $enableKeys = [
        'PAYMENTSYSTEMTYPE', 'INSTALLMENTS'
    ];
    static private $disableKeys = [
        'PAYMENTSYSTEMTYPE', 'INSTALLMENTS'
    ];

    public function add($args)
    {
        $this->action = 'PAYMENTTYPEADD';
        $args = MerchantSafeUnipay\filter(self::$addKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'PAYMENTTYPEEDIT';
        $args = MerchantSafeUnipay\filter(self::$editKeys, $args);
        $this->queryParameters = $args;
    }

    public function enable($args)
    {
        $this->action = 'PAYMENTTYPEENABLE';
        $args = MerchantSafeUnipay\filter(self::$enableKeys, $args);
        $this->queryParameters = $args;
    }

    public function disable($args)
    {
        $this->action = 'PAYMENTTYPEDISABLE';
        $args = MerchantSafeUnipay\filter(self::$disableKeys, $args);
        $this->queryParameters = $args;
    }
}
