<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

class EWallet extends ActionAbstract implements ActionInterface
{
    public function addCard($args)
    {
        $this->action = 'EWALLETADDCARD';
        $queryParamKeys = [
            'CUSTOMER', 'NAMEONCARD', 'CARDPAN', 'CARDEXPIRY', 'CARDSAVENAME', 'CUSTOMERNAME', 'CUSTOMEREMAIL',
            'CUSTOMERPHONE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function editCard($args)
    {
        $this->action = 'EWALLETEDITCARD';
        $queryParamKeys = [
            'CARDTOKEN', 'CARDEXPIRY', 'NAMEONCARD', 'CARDSAVENAME'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }


    public function deleteCard($args)
    {
        $this->action = 'EWALLETDELETECARD';
        $queryParamKeys = [
            'CARDTOKEN'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
