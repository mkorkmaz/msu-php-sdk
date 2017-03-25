<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class DealerType extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYDEALERTYPE';
    static protected $queryParamKeys = [
        'DEALERTYPENAME'
    ];
}
