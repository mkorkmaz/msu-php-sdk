<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class DealerType extends ActionAbstract implements ActionInterface
{
    static private $addKeys = [
        'DEALERTYPENAME', 'DESCRIPTIONREQUIRED', 'MAXINSTALLMENTCOUNT'
    ];
    static private $editKeys = [
        'DEALERTYPENAME', 'DESCRIPTIONREQUIRED', 'MAXINSTALLMENTCOUNT'
    ];
    static private $deleteKeys = [
        'DEALERTYPENAME'
    ];

    public function add($args)
    {
        $this->action = 'DEALERTYPEADD';
        $args = MerchantSafeUnipay\filter(self::$addKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function edit($args)
    {
        $this->action = 'DEALERTYPEEDIT';
        $args = MerchantSafeUnipay\filter(self::$editKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function delete($args)
    {
        $this->action = 'DEALERTYPEDELETE';
        $args = MerchantSafeUnipay\filter(self::$deleteKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }
}
