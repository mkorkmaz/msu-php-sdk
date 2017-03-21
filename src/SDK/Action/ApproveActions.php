<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class ApproveActions extends ActionAbstract implements ActionInterface
{


    public function approveTransaction($args)
    {
        $this->action = 'APPROVETRANSACTION';
        $queryParamKeys = [
            'PGTRANID'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function approveDealer($args)
    {
        $this->action = 'DEALERAPPROVE';
        $queryParamKeys = [
            'DEALERCODE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
