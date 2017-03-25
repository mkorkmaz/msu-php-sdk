<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\SDK\Action;

use MerchantSafeUnipay;

final class MessageContent extends ActionAbstract implements ActionInterface
{
    public function add($args)
    {
        $this->action = 'MESSAGECONTENTADD';
        $queryParamKeys = [
            'TITLE', 'CONTENT', 'MESSAGECONTENTTYPE', 'LANGUAGE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }

    public function edit($args)
    {
        $this->action = 'MESSAGECONTENTEDIT';
        $queryParamKeys = [
            'MESSAGECONTENTID', 'TITLE', 'CONTENT', 'MESSAGECONTENTTYPE', 'LANGUAGE'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }


    public function delete($args)
    {
        $this->action = 'MESSAGECONTENTDELETE';
        $queryParamKeys = [
            'MESSAGECONTENTID'
        ];
        $args = MerchantSafeUnipay\filter($queryParamKeys, $args);
        $this->queryParameters = $args;
    }
}
