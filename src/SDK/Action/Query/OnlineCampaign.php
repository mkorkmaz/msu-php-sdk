<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

final class OnlineCampaign extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYCAMPAIGNONLINE';
    static protected $queryParamKeys = [
        'INSTALLMENTS', 'MERCHANTPAYMENTID', 'AMOUNT', 'CUSTOMER', 'CURRENCY', 'SESSIONTOKEN', 'CARDTOKEN', 'CARDPAN',
        'CARDEXPIRY', 'NAMEONCARD', 'CUSTOMERIP', 'CUSTOMERUSERAGENT', 'CARDCVV', 'EXTRA', 'FORGROUP'
    ];
}
