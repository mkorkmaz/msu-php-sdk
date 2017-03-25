<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

final class Points extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYBIN';
    static protected $queryParamKeys = [
        'MERCHANTPAYMENTID', 'AMOUNT' ,'CUSTOMER', 'CURRENCY', 'SESSIONTOKEN', 'CARDTOKEN', 'CARDPAN', 'CARDEXPIRY',
        'NAMEONCARD', 'CARDCVV', 'INSTALLMENTS', 'PAYMENTSYSTEM', 'FORGROUP'
    ];
}
