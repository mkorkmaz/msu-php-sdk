<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class MerchantUser extends ActionAbstract implements ActionInterface
{
    static private $addKeys = [
        'USERNAME', 'MERCHANTUSEREMAIL', 'ROLE', 'TIMEZONE'
    ];
    static private $editKeys = [
        'USERNAME', 'MERCHANTUSEREMAIL', 'ROLE', 'ISLOCKED', 'MERCHANTUSERPASSWORD', 'CONFIRMPASSWORD'
    ];
    static private $reinviteKeys = [
        'MERCHANTUSEREMAIL'
    ];

    public function add($args)
    {
        $this->action = 'MERCHANTUSERADD';
        $args = MerchantSafeUnipay\filter(self::$addKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'MERCHANTUSEREDIT';
        $args = MerchantSafeUnipay\filter(self::$editKeys, $args);
        $this->queryParameters = $args;
    }

    public function reinvite($args)
    {
        $this->action = 'MERCHANTUSERREINVITE';
        $args = MerchantSafeUnipay\filter(self::$reinviteKeys, $args);
        $this->queryParameters = $args;
    }
}
