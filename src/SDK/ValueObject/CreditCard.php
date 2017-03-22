<?php
declare(strict_types=1);

namespace MerchantSafeUnipay\ValueObject;

use Zend\Validator\CreditCard as CreditCardValidator;
use InvalidArgumentException;

class CreditCard
{
    private $cardNumber;
    private $expireDateMonth;
    private $expireDateYear;
    private $nameOnCard;
    private $cardVerificationVal;
    private $cardType; // check values of Zend\Validator\CreditCard::$cardName

    protected static $validCardTypes = [
        'All',
        'American_Express',
        'Unionpay',
        'Diners_Club',
        'Diners_Club_US',
        'Discover',
        'JCB',
        'Laser',
        'Maestro',
        'Mastercard',
        'Solo',
        'Visa'
    ];

    public function __construct(
        string $cardNumber,
        string $expireDateMonth,
        string $expireDateYear,
        string $cardVerificationVal,
        string $cardType,
        string $nameOnCard
    ) {
    
        $this->cardNumber = trim($cardNumber);
        $this->expireDateMonth = trim($expireDateMonth);
        $this->expireDateYear = trim($expireDateYear);
        $this->cardVerificationVal = trim($cardVerificationVal);
        $this->cardType = trim($cardType);
        $this->nameOnCard = trim($nameOnCard);
    }

    public function validate()
    {
        $this->validateCardType();
        $this->validateCardNumber();
        $this->validatecardVerificationValue();
        $this->validateNameOnCard();
        $this->validateExpireDates();
        return true;
    }

    private function validateCardType()
    {
        if (!in_array($this->cardType, self::$validCardTypes, true)) {
            $message = sprintf('%s is not valid card type. See Zend\Validator\CreditCard::$cardName', $this->cardType);
            throw new InvalidArgumentException($message);
        }
        return true;
    }

    private function validateCardNumber()
    {
        $valid = new CreditCardValidator($this->cardType);
        if (!$valid->isValid($this->cardNumber)) {
            $message = sprintf('%s is not valid %s card number.', $this->cardNumber, $this->cardType);
            throw new InvalidArgumentException($message);
        }
        return true;
    }

    private function validatecardVerificationValue()
    {
        if (is_numeric($this->cardVerificationVal)
            && $this->cardType === CreditCardValidator::AMERICAN_EXPRESS
            && strlen($this->cardVerificationVal) === 4
        ) {
            return true;
        }
        if (is_numeric($this->cardVerificationVal)
            && $this->cardType !== CreditCardValidator::AMERICAN_EXPRESS
            && strlen($this->cardVerificationVal) === 3
        ) {
            return true;
        }
        $message = sprintf('%s is not valid CVV.', $this->cardVerificationVal);
        throw new InvalidArgumentException($message);
    }

    private function validateNameOnCard()
    {
        if (empty(trim($this->nameOnCard))) {
            $message = 'Name on card cannot be empty';
            throw new InvalidArgumentException($message);
        }
        return true;
    }

    private function validateExpireDates()
    {
        preg_match('#^0[1-9]|1[012]$#', $this->expireDateMonth, $matches);
        if (empty($matches)) {
            $message = 'month value of card expire date is not valid.';
            throw new InvalidArgumentException($message);
        }

        if (!is_numeric($this->expireDateYear)
            || strlen($this->expireDateYear) !== 4
            || $this->expireDateYear < date('Y')
        ) {
            $message = 'Year value of card expire date is not valid.';
            throw new InvalidArgumentException($message);
        }
        return true;
    }
}
