<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class RecurringPlanCard extends ActionAbstract implements ActionInterface
{

    public function add($args)
    {
        $this->action = 'RECURRINGPLANCARDADD';
        $queryParamKeys = [
            'RECURRINGPLANCODE', 'CARDPAN', 'CARDEXPIRY', 'NAMEONCARD', 'CARDTOKEN', 'CARDSAVENAME'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function query($args)
    {
        $this->action = 'QUERYRECURRINGPLANCARD';
        $queryParamKeys = [
            'RECURRINGPLANCODE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function delete($args)
    {
        $this->action = 'RECURRINGPLANCARDDELETE';
        $queryParamKeys = [
            'RECURRINGPLANCODE', 'CARDTOKEN'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function resendLink($args)
    {
        $this->action = 'RECURRINGPLANRESENDLINK';
        $queryParamKeys = [
            'RECURRINGPLANCODE', 'NOTIFICATIONCHANNELS'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
