<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

final class Installment extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYINSTALLMENT';
    static protected $queryParamKeys = [
        'PAYMENTSYSTEM', 'PAYMENTSYSTEMTYPE', 'STATUS'
    ];
}
