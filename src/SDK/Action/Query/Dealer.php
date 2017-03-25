<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

final class Dealer extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYDEALER';
    static protected $queryParamKeys = [
        'DEALERCODE', 'PARENTDEALERCODE'
    ];
}
