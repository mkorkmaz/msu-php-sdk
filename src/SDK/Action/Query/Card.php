<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class Card extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYCARD';
    static protected $queryParamKeys = [
        'CARDTOKEN', 'CARDSAVENAME', 'CUSTOMER', 'FORGROUP', 'OFFSET', 'LIMIT'
    ];
}
