<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

final class PaymentPolicy extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYPAYMENTPOLICY';
    static protected $queryParamKeys = [
        'PAYMENTSYSTEM', 'CURRENCY'
    ];
}
