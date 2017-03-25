<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class UserRolePermission extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYUSERROLEPERMISSION';
    static protected $queryParamKeys = [
        'PERMISSION'
    ];
}
