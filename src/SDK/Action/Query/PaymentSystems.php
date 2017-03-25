<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class PaymentSystems extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYPAYMENTSYSTEMS';
    static protected $queryParamKeys = [
        'BIN', 'CARDTOKEN'
    ];
}
