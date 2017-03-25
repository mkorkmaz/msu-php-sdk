<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class MerchantStatusHistory extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYMERCHANTSTATUSHISTORY';
    static protected $queryParamKeys = [
        'MERCHANTBUSINESSID', 'STATUS', 'STARTDATE', 'ENDDATE'
    ];
}
