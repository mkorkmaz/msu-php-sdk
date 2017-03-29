<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class MessageContent extends ActionAbstract implements ActionInterface
{
    static private $addKeys = [
        'TITLE', 'CONTENT', 'MESSAGECONTENTTYPE', 'LANGUAGE'
    ];
    static private $editKeys = [
        'MESSAGECONTENTID', 'TITLE', 'CONTENT', 'MESSAGECONTENTTYPE', 'LANGUAGE'
    ];
    static private $deleteKeys = [
        'MESSAGECONTENTID'
    ];

    public function add($args)
    {
        $this->action = 'MESSAGECONTENTADD';
        $args = MerchantSafeUnipay\filter(self::$addKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function edit($args)
    {
        $this->action = 'MESSAGECONTENTEDIT';
        $args = MerchantSafeUnipay\filter(self::$editKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }

    public function delete($args)
    {
        $this->action = 'MESSAGECONTENTDELETE';
        $args = MerchantSafeUnipay\filter(self::$deleteKeys, $args);
        $this->queryParameters = array_merge($this->merchantParams, $args);
    }
}
