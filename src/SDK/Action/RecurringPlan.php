<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class RecurringPlan extends ActionAbstract implements ActionInterface
{
    static private $addKeys = [
        'CARDTOKEN', 'CUSTOMER', 'CUSTOMERNAME', 'CUSTOMEREMAIL', 'CUSTOMERPHONE', 'TCKN', 'RECURRINGPLANCODE',
        'FIRSTAMOUNT', 'RECURRINGAMOUNT', 'RECURRENCECOUNT', 'FREQUENCY', 'OCCURRENCE', 'STARTDATE', 'CURRENCY',
        'PAYMENTSYSTEM', 'NOTIFICATIONCHANNELS'
    ];
    static private $editKeys = [
        'RECURRINGPLANCODE', 'RECURRINGPLANSTATUS', 'RECURRINGAMOUNT', 'PAYMENTSYSTEM'
    ];
    static private $deleteKeys = [
        'RECURRINGPLANCODE'
    ];
    static private $resendLinkKeys = [
        'RECURRINGPLANCODE', 'NOTIFICATIONCHANNELS'
    ];

    public function add($args)
    {
        $this->action = 'RECURRINGPLANADD';
        $args = MerchantSafeUnipay\filter(self::$addKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'RECURRINGPLANEDIT';
        $args = MerchantSafeUnipay\filter(self::$editKeys, $args);
        $this->queryParameters = $args;
    }

    public function delete($args)
    {
        $this->action = 'RECURRINGPLANDELETE';
        $args = MerchantSafeUnipay\filter(self::$deleteKeys, $args);
        $this->queryParameters = $args;
    }

    public function resendLink($args)
    {
        $this->action = 'RECURRINGPLANRESENDLINK';
        $args = MerchantSafeUnipay\filter(self::$resendLinkKeys, $args);
        $this->queryParameters = $args;
    }
}
