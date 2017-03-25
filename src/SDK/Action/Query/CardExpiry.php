<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class CardExpiry extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYCARDEXPIRY';
    static protected $queryParamKeys = [
        'CUSTOMER', 'OFFSET', 'LIMIT'
    ];
}