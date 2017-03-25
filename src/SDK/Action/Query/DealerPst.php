<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class DealerPst extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYDEALERPST';
    static protected $queryParamKeys = [
        'PAYMENTSYSTEMTYPE', 'DEALERCODE'
    ];
}
