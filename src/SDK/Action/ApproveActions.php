<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class ApproveActions extends ActionAbstract implements ActionInterface
{
    static private $approveTransactionKeys = [
        'PGTRANID'
    ];
    static private $approveDealerKeys = [
        'DEALERCODE'
    ];

    public function approveTransaction($args)
    {
        $this->action = 'APPROVETRANSACTION';
        $args = MerchantSafeUnipay\filter(self::$approveTransactionKeys, $args);
        $this->queryParameters = $args;
    }

    public function approveDealer($args)
    {
        $this->action = 'DEALERAPPROVE';
        $args = MerchantSafeUnipay\filter(self::$approveDealerKeys, $args);
        $this->queryParameters = $args;
    }
}
