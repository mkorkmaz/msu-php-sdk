<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action\Query;

use MerchantSafeUnipay;
use MerchantSafeUnipay\SDK\Action\ActionAbstract;

abstract class QueryAbstract extends ActionAbstract
{
    public function getQuery($args)
    {
        $args = MerchantSafeUnipay\filter(static::$queryParamKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function getAction()
    {
        return static::$queryAction;
    }
}
