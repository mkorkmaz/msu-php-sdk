<?php declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

abstract class ActionAbstract
{
    protected $merchantParams;
    protected $action;
    protected $queryParameters;
    protected $headers = [];

    public function __construct(array $merchantParams)
    {
        $this->merchantParams = $merchantParams;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getQueryParams()
    {
        return $this->queryParameters;
    }
}
