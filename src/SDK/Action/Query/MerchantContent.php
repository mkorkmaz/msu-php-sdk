<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class MerchantContent extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYMERCHANTCONTENT';
    static protected $queryParamKeys = [
        'MERCHANTCONTENTID'
    ];
}
