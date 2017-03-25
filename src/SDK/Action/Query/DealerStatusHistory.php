<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

final class DealerStatusHistory extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYDEALERSTATUSHISTORY';
    static protected $queryParamKeys = [
        'DEALERCODE', 'STATUS', 'STARTDATE', 'ENDDATE', 'REASON'
    ];
}
