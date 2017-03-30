## MerchantSafe Unipay PHP SDK - Work In Progress

[![Build Status](https://api.travis-ci.org/mkorkmaz/msu-php-sdk.svg?branch=master)](https://travis-ci.org/mkorkmaz/msu-php-sdk) [![Coverage Status](https://coveralls.io/repos/github/mkorkmaz/msu-php-sdk/badge.svg?branch=master)](https://coveralls.io/github/mkorkmaz/msu-php-sdk?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mkorkmaz/msu-php-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mkorkmaz/msu-php-sdk/) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/3f47b0ec1eb8496cbc3d79c6fdbba417)](https://www.codacy.com/app/mehmet/msu-php-sdk?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=mkorkmaz/msu-php-sdk&amp;utm_campaign=Badge_Grade) [![Latest Stable Version](https://poser.pugx.org/mkorkmaz/msu-php-sdk/v/stable)](https://packagist.org/packages/mkorkmaz/msu-php-sdk) [![Total Downloads](https://poser.pugx.org/mkorkmaz/msu-php-sdk/downloads)](https://packagist.org/packages/mkorkmaz/msu-php-sdk) [![Latest Unstable Version](https://poser.pugx.org/mkorkmaz/msu-php-sdk/v/unstable)](https://packagist.org/packages/mkorkmaz/msu-php-sdk) [![License](https://poser.pugx.org/mkorkmaz/msu-php-sdk/license)](https://packagist.org/packages/mkorkmaz/msu-php-sdk)

[MerchantSafe Unipay (MSU)](https://merchantsafeunipay.com/msu/api/v2/doc) is an online payment solution 
developed by [Asseco SEE Turkey](https://tr.asseco.com/). **This SDK is not an official SDK**. This library written 
since Asseco don't provide any PHP SDK.


## Installation

You need [Composer](https://getcomposer.org/) to install MerchantSafe Unipay PHP SDK

```bash
composer require mkorkmaz/msu-php-sdk
```

## Documentation

You can see detailed documentaiton at [https://mkorkmaz.github.io/msu-php-sdk-doc/](https://mkorkmaz.github.io/msu-php-sdk-doc/)

## Basic Usage

```php
$env = 'https://test.merchantsafeunipay.com/msu/api/v2'; 
$merchant = 'COMPANYNAME'; // Given by Asseco
$merchantUser = 'apiuser@companyname.com'; // Created on MSU Panel
$merchantPassword = 'u+B56?mcjh23'; // Created on MSU Panel

$client = MerchantSafeUnipay\SDK\ClientBuilder::create()
    ->setEnvironment($env, $merchant , $merchantUser, $merchantPassword)
    ->setLogger()
    ->build();
    
$args = [
    'MERCHANTPAYMENTID' => $orderPaymetId,
    'CUSTOMER' => '1',
    'AMOUNT' => 123.50,
    'CURRENCY' => 'TRY',
    'CUSTOMEREMAIL' => 'mehmet@github.com',
    'CUSTOMERNAME' => 'Mehmet Korkmaz',
    'CUSTOMERIP'    => '127.0.0.1',
    'CARDPAN' => '5406675406675403', // Test Card Number
    'CARDEXPIRY' => '12.30',
    'NAMEONCARD' => 'MEHMET KORKMAZ',
    'CARDCVV' => '000'
];
$response = $client->financialTransactions('sale', $args);

echo $response['data']['responseCode']; // prints '00' which means transaction has been done successfully.

```

## Actions


1. [x] Financial Transactions
2. [x] Approve Actions
3. [x] Reject Actions
4. [x] Session
5. [x] Pay by Link Payment Actions
6. [x] Recurring Plan Actions
7. [x] Recurring Plan Card Actions
8. [x] Recurring Plan Actions
9. [x] Payment Type
10. [x] Payment Policy
11. [x] Message Content
12. [x] e-Wallet Actions
13. [x] Merchant Actions
14. [x] Merchant User Actions
15. [x] Dealer Actions
16. [x] Dealer Type Actions
17. [x] Dealer Payment System Type Actions
18. [x] Query


## Disclaimer

- MerchantSafe Unipay (MSU) is trademark of Asseco SEE Turkey
- I am not affiliated with Asseco SEE Turkey

## TODO

- Integration tests of Actions (At least %80 Code Coverage)
- Argument combinations for the actions will be implemented