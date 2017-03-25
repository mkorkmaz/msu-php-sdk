<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

final class SubDealerTransaction extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYSUBDEALERTRANSACTION';
    static protected $queryParamKeys = [
        'PARENTDEALERCODE', 'PAYMENTSYSTEM', 'PGTRANID', 'MERCHANTPAYMENTID', 'CUSTOMER', 'TRANSACTIONSTATUS',
        'TRANSACTIONTYPE', 'STARTDATE', 'ENDDATE'
    ];
}
