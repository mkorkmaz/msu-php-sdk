<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

final class Campaign extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYCAMPAIGN';
    static protected $queryParamKeys = [
        'BIN'
    ];
}
