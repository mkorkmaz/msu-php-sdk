<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class PayByLinkPayment extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYPAYBYLINKPAYMENT';
    static protected $queryParamKeys = [
        'PAYBYLINKTOKEN', 'STARTDATE', 'ENDDATE', 'DUEDATE', 'CUSTOMEREMAIL', 'PAYBYLINKSTATUS'
    ];
}
