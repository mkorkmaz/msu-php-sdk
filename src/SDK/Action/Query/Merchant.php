<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class Merchant extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYMERCHANT';
    static protected $queryParamKeys = [
        'MERCHANTBUSINESSID'
    ];
}
