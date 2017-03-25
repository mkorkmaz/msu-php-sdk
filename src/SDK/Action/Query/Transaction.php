<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

final class Transaction extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYTRANSACTION';
    static protected $queryParamKeys = [
        'PGTRANID', 'TRANSACTIONSTATUS', 'STARTDATE', 'ENDDATE', 'OFFSET', 'LIMIT', 'CONTACTWEBADDRESS', 'DEALERTYPES'
    ];
}
