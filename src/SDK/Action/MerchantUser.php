<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class MerchantUser extends ActionAbstract implements ActionInterface
{
    public function add($args)
    {
        $this->action = 'MERCHANTUSERADD';
        $queryParamKeys = [
            'USERNAME', 'MERCHANTUSEREMAIL', 'ROLE', 'TIMEZONE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'MERCHANTUSEREDIT';
        $queryParamKeys = [
            'USERNAME', 'MERCHANTUSEREMAIL', 'ROLE', 'ISLOCKED', 'MERCHANTUSERPASSWORD', 'CONFIRMPASSWORD'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function reinvite($args)
    {
        $this->action = 'MERCHANTUSERREINVITE';
        $queryParamKeys = [
            'MERCHANTUSEREMAIL'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
