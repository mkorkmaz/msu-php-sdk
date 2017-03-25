<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class RecurringPlan extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYRECURRINGPLAN';
    static protected $queryParamKeys = [
        'RECURRINGPLANCODE', 'RECURRINGPLANSTATUS', 'STARTDATE', 'ENDDATE', 'CARDPAN', 'CUSTOMER', 'CARDTOKEN',
        'CUSTOMEREMAIL', 'CUSTOMERNAME', 'CUSTOMERPHONE'
    ];
}
