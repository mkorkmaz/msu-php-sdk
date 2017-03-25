<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class Customer extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYCUSTOMER';
    static protected $queryParamKeys = [
        'CUSTOMER'
    ];
}
