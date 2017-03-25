<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class PaymentSystemData extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYPAYMENTSYSTEMDATA';
    static protected $queryParamKeys = [
        'INSTALLMENTS', 'EFTCODE', 'BIN', 'PAYMENTSYSTEMTYPE'
    ];
}
