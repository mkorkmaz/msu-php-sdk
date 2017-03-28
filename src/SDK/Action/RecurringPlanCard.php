<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class RecurringPlanCard extends ActionAbstract implements ActionInterface
{
    static private $addKeys = [
        'RECURRINGPLANCODE', 'CARDPAN', 'CARDEXPIRY', 'NAMEONCARD', 'CARDTOKEN', 'CARDSAVENAME'
    ];
    static private $queryKeys = [
        'RECURRINGPLANCODE'
    ];
    static private $deleteKeys = [
        'RECURRINGPLANCODE', 'CARDTOKEN'
    ];

    public function add($args)
    {
        $this->action = 'RECURRINGPLANCARDADD';
        $args = MerchantSafeUnipay\filter(self::$addKeys, $args);
        $this->queryParameters = $args;
    }

    public function query($args)
    {
        $this->action = 'QUERYRECURRINGPLANCARD';
        $args = MerchantSafeUnipay\filter(self::$queryKeys, $args);
        $this->queryParameters = $args;
    }

    public function delete($args)
    {
        $this->action = 'RECURRINGPLANCARDDELETE';
        $args = MerchantSafeUnipay\filter(self::$deleteKeys, $args);
        $this->queryParameters = $args;
    }

}
