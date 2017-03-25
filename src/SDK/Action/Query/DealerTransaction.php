<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class DealerTransaction extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYDEALERTRANSACTION';
    static protected $queryParamKeys = [
        'DEALERCODE', 'PAYMENTSYSTEM', 'PGTRANID', 'MERCHANTPAYMENTID', 'CUSTOMER', 'TRANSACTIONSTATUS',
        'TRANSACTIONTYPE', 'STARTDATE', 'ENDDATE'
    ];
}
