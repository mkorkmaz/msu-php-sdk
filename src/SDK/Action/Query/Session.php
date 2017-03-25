<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionInterface;

class Session extends QueryAbstract implements ActionInterface
{
    static protected $queryAction = 'QUERYSESSION';
    static protected $queryParamKeys = [
        'SESSIONTOKEN'
    ];
    public function getQuery($args)
    {
        $this->queryParameters = MerchantSafeUnipay\filter($this->queryParamKeys, $args);
    }
}
