<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class Dealer extends ActionAbstract implements ActionInterface
{
    static private $addKeys = [
        'NAME', 'DEALERCODE', 'CONTACTNAME', 'CONTACTPHONE', 'CONTACTEMAIL', 'CONTACTFAX',
        'CONTACTWEBADDRESS', 'DEALERTYPES'
    ];

    static private $editKeys = [
        'NAME', 'DEALERCODE', 'PARENTDEALERCODE', 'CONTACTNAME', 'CONTACTPHONE', 'CONTACTEMAIL', 'CONTACTFAX',
        'CONTACTWEBADDRESS', 'DEALERTYPES'
    ];
    static private $enableKeys = [
        'DEALERCODE', 'REASON'
    ];
    static private $disableKeys = [
        'DEALERCODE', 'REASON'
    ];
    static private $addMerchantUserDealerKeys = [
        'MERCHANTUSEREMAIL', 'DEALERCODES'
    ];
    static private $deleteMerchantUserDealerKeys = [
        'MERCHANTUSEREMAIL', 'DEALERCODES'
    ];

    public function add($args)
    {
        $this->action = 'DEALERADD';
        $args = MerchantSafeUnipay\filter(self::$addKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'DEALEREDIT';
        $args = MerchantSafeUnipay\filter(self::$editKeys, $args);
        $this->queryParameters = $args;
    }

    public function enable($args)
    {
        $this->action = 'DEALERENABLE';
        $args = MerchantSafeUnipay\filter(self::$enableKeys, $args);
        $this->queryParameters = $args;
    }

    public function disable($args)
    {
        $this->action = 'DEALERDISABLE';
        $args = MerchantSafeUnipay\filter(self::$disableKeys, $args);
        $this->queryParameters = $args;
    }

    public function addMerchantUserDealer($args)
    {
        $this->action = 'MERCHANTUSERDEALERADD';
        $args = MerchantSafeUnipay\filter(self::$addMerchantUserDealerKeys, $args);
        $this->queryParameters = $args;
    }

    public function removeMerchantUserDealer($args)
    {
        $this->action = 'MERCHANTUSERDEALERREMOVE';
        $args = MerchantSafeUnipay\filter(self::$deleteMerchantUserDealerKeys, $args);
        $this->queryParameters = $args;
    }
}
