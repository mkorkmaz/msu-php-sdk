<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class SplitPayment extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYSPLITPAYMENT';
    static protected $queryParamKeys = [
        'SPLITPAYMENTCODE', 'STARTDATE' ,'ENDDATE', 'CUSTOMER', 'DEALERCODES'
    ];
}
