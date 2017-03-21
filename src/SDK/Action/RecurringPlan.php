<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class RecurringPlan extends ActionAbstract implements ActionInterface
{

    public function add($args)
    {
        $this->action = 'RECURRINGPLANADD';
        $queryParamKeys = [
            'CARDTOKEN', 'CUSTOMER', 'CUSTOMERNAME', 'CUSTOMEREMAIL', 'CUSTOMERPHONE', 'TCKN', 'RECURRINGPLANCODE',
            'FIRSTAMOUNT', 'RECURRINGAMOUNT', 'RECURRENCECOUNT', 'FREQUENCY', 'OCCURRENCE', 'STARTDATE', 'CURRENCY',
            'PAYMENTSYSTEM', 'NOTIFICATIONCHANNELS'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'RECURRINGPLANEDIT';
        $queryParamKeys = [
            'RECURRINGPLANCODE', 'RECURRINGPLANSTATUS', 'RECURRINGAMOUNT', 'PAYMENTSYSTEM'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function delete($args)
    {
        $this->action = 'RECURRINGPLANDELETE';
        $queryParamKeys = [
            'RECURRINGPLANCODE'
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
