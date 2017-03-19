<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

interface ActionInterface
{
    public function getAction();
    public function getHeaders();
    public function getQueryParams();
}
