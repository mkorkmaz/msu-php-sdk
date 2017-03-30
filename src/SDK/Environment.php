<?php declare(strict_types=1);

namespace MerchantSafeUnipay\SDK;

class Environment
{
    protected $merchant;
    protected $merchantUser;
    protected $merchantPassword;

    public function __construct(string $apiUrl, string $merchant, string $merchantUser, string $merchantPassword)
    {
        $this->apiUrl = $apiUrl;
        $this->merchant = $merchant;
        $this->merchantUser = $merchantUser;
        $this->merchantPassword = $merchantPassword;
    }

    public function getUrl()
    {
        return $this->apiUrl;
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
