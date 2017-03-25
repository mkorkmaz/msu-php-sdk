<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class DealerPst extends ActionAbstract implements ActionInterface
{
    public function add($args)
    {
        $this->action = 'DEALERPSTADD';
        $queryParamKeys = [
            'SUBMERCHANTCODE', 'PAYMENTSYSTEMTYPE', 'DEALERCODE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'DEALERPSTEDIT';
        $queryParamKeys = [
            'SUBMERCHANTCODE', 'PAYMENTSYSTEMTYPE', 'DEALERCODE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function delete($args)
    {
        $this->action = 'DEALERPSTDELETE';
        $queryParamKeys = [
            'DEALERCODE', 'PAYMENTSYSTEMTYPE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
