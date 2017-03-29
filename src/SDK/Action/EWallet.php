<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class EWallet extends ActionAbstract implements ActionInterface
{
    static private $addCardKeys = [
        'CUSTOMER', 'NAMEONCARD', 'CARDPAN', 'CARDEXPIRY', 'CARDSAVENAME', 'CUSTOMERNAME', 'CUSTOMEREMAIL',
        'CUSTOMERPHONE'
    ];
    static private $editCardKeys = [
        'CARDTOKEN', 'CARDEXPIRY', 'NAMEONCARD', 'CARDSAVENAME'
    ];
    static private $deleteCardKeys = [
        'CARDTOKEN'
    ];

    public function addCard($args)
    {
        $this->action = 'EWALLETADDCARD';
        $args = MerchantSafeUnipay\filter(self::$addCardKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function editCard($args)
    {
        $this->action = 'EWALLETEDITCARD';
        $args = MerchantSafeUnipay\filter(self::$editCardKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function deleteCard($args)
    {
        $this->action = 'EWALLETDELETECARD';
        $args = MerchantSafeUnipay\filter(self::$deleteCardKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }
}
