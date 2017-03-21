<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class Dealer extends ActionAbstract implements ActionInterface
{
    public function add($args)
    {
        $this->action = 'DEALERADD';
        $queryParamKeys = [
            'NAME', 'DEALERCODE', 'CONTACTNAME', 'CONTACTPHONE', 'CONTACTEMAIL', 'CONTACTFAX',
            'CONTACTWEBADDRESS', 'DEALERTYPES'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'DEALEREDIT';
        $queryParamKeys = [
            'NAME', 'DEALERCODE', 'PARENTDEALERCODE', 'CONTACTNAME', 'CONTACTPHONE', 'CONTACTEMAIL', 'CONTACTFAX',
            'CONTACTWEBADDRESS', 'DEALERTYPES'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function enable($args)
    {
        $this->action = 'DEALERENABLE';
        $queryParamKeys = [
            'DEALERCODE', 'REASON'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function disable($args)
    {
        $this->action = 'DEALERDISABLE';
        $queryParamKeys = [
            'DEALERCODE', 'REASON'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function addMerchantUserDealer($args)
    {
        $this->action = 'MERCHANTUSERDEALERADD';
        $queryParamKeys = [
            'MERCHANTUSEREMAIL', 'DEALERCODES'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function removeMerchantUserDealer($args)
    {
        $this->action = 'MERCHANTUSERDEALERREMOVE';
        $queryParamKeys = [
            'MERCHANTUSEREMAIL', 'DEALERCODES'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
