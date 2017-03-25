<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class Bin extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYBIN';
    static protected $queryParamKeys = [
        'BIN', 'CARDTOKEN'
    ];
}
