<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Environment;

class EnvironmentAbstract
{
    private $merchant;
    private $merchantUser;
    private $merchantPassword;

    public function __construct(string $merchant, string $merchantUser, string $merchantPassword)
    {
        $this->merchant = $merchant;
        $this->merchantUser = $merchantUser;
        $this->merchantPassword = $merchantPassword;
    }

    public function getUrl()
    {
        return $this->apiUrl;
    }
}
