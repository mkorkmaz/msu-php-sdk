<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class DealerType extends ActionAbstract implements ActionInterface
{
    public function add($args)
    {
        $this->action = 'DEALERTYPEADD';
        $queryParamKeys = [
            'DEALERTYPENAME', 'DESCRIPTIONREQUIRED', 'MAXINSTALLMENTCOUNT'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'DEALERTYPEEDIT';
        $queryParamKeys = [
            'DEALERTYPENAME', 'DESCRIPTIONREQUIRED', 'MAXINSTALLMENTCOUNT'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function delete($args)
    {
        $this->action = 'DEALERTYPEDELETE';
        $queryParamKeys = [
            'DEALERTYPENAME'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
