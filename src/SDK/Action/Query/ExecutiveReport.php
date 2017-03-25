<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class ExecutiveReport extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYEXECUTIVEREPORT';
    static protected $queryParamKeys = [
        'MERCHANTGROUPNAME', 'MERCHANTBUSINESSID', 'MERCHANTUSEREMAIL', 'DEALERCODE', 'SPLITPAYMENTTYPE'
    ];
}
