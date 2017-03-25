<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

final class MerchantUser extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYMERCHANTUSER';
    static protected $queryParamKeys = [
        'MERCHANTUSEREMAIL', 'MERCHANTUSERPASSWORD', 'ROLE'
    ];
}
