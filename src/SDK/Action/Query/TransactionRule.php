<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

final class TransactionRule extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYTRANSACTIONRULE';
    static protected $queryParamKeys = [
        'DEALERCODE'
    ];
}
