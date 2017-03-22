<?php declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Environment;

abstract class EnvironmentAbstract
{
    protected $merchant;
    protected $merchantUser;
    protected $merchantPassword;

    public function __construct(string $merchant, string $merchantUser, string $merchantPassword)
    {
        $this->merchant = $merchant;
        $this->merchantUser = $merchantUser;
        $this->merchantPassword = $merchantPassword;
    }

    public function getUrl()
    {
        return static::$apiUrl;
    }

    public function getMerchantData()
    {
        return [
            'MERCHANT' => $this->merchant,
            'MERCHANTUSER' => $this->merchantUser,
            'MERCHANTPASSWORD' => $this->merchantPassword
        ];
    }
}
