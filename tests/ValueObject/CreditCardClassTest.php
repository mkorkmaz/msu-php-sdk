<?php
declare(strict_types=1);


namespace tests;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use MerchantSafeUnipay\ValueObject\CreditCard;
use Zend\Validator\CreditCard as CreditCardValidator;

use InvalidArgumentException;
use Faker;

class MyCreditCardClass extends TestCase
{
    protected $faker;

    static protected $fakerZendValidatorCardTypes = [
        'Mastercard' => 'MasterCard',
        'Visa' => 'Visa',
        'American_Express' => 'American Express'
    ];

    protected function setUp()
    {
        $this->faker = Faker\Factory::create();
    }

    /**
     * @test
     */
    public function shouldValidateMethodReturnTrue()
    {
        $creditCard = new CreditCard(
            $this->faker->creditCardNumber(self::$fakerZendValidatorCardTypes[CreditCardValidator::MASTERCARD]),
            '12',
            date('Y'),
            '123',
            CreditCardValidator::MASTERCARD,
            $this->faker->name
        );

        $result = $creditCard->validate();
        $this->assertTrue($result);
    }
    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldValidateMethodThrowException()
    {
        $creditCard = new CreditCard(
            $this->faker->creditCardNumber(self::$fakerZendValidatorCardTypes[CreditCardValidator::MASTERCARD]),
            '12',
            date('Y'),
            '123',
            CreditCardValidator::VISA,
            $this->faker->name
        );

        $result = $creditCard->validate();
    }


    /**
     * @test
     * @param string $cardType
     * @dataProvider validCardTypeDataProvider
     */
    public function shouldPassValidateCardType($cardType)
    {
        $method = new ReflectionMethod(CreditCard::class, 'validateCardType');
        $method->setAccessible(true);
        $result = $method->invoke(new CreditCard(
            '0000000000000000',
            '12',
            date('Y'),
            '123',
            $cardType,
            $this->faker->name
        ));
        $this->assertTrue($result);
    }

    /**
     * @test
     * @param string $cardType
     * @dataProvider invalidCardTypeDataProvider
     * @expectedException InvalidArgumentException
     */
    public function shouldFailForInvalidCardType($cardType)
    {
        $method = new ReflectionMethod(CreditCard::class, 'validateCardType');
        $method->setAccessible(true);
        $method->invoke(new CreditCard(
            '0000000000000000',
            '12',
            date('Y'),
            '123',
            $cardType,
            $this->faker->name
        ));
    }

    public function validCardTypeDataProvider()
    {
        return [
            [CreditCardValidator::AMERICAN_EXPRESS],
            [CreditCardValidator::VISA],
            [CreditCardValidator::MASTERCARD],
            [CreditCardValidator::MAESTRO]
        ];
    }

    public function invalidCardTypeDataProvider()
    {
        return [
            ['Amerikan_Ekspress'],
            ['American Express'],
            ['Viisa'],
            ['Masterkard'],
            ['Mayestro']
        ];
    }


    /**
     * @test
     * @param string $cardNumber
     * @param string $cardType
     * @dataProvider validCardNumberDataProvider
     */
    public function shouldPassValidateCardNumber($cardNumber, $cardType)
    {
        $method = new ReflectionMethod(CreditCard::class, 'validateCardNumber');
        $method->setAccessible(true);
        $result = $method->invoke(new CreditCard(
            $cardNumber,
            '12',
            date('Y'),
            '123',
            $cardType,
            $this->faker->name
        ));
        $this->assertTrue($result);
    }

    /**
     * @test
     * @param string $cardNumber
     * @param string $cardType
     * @dataProvider invalidCardNumberDataProvider
     * @expectedException InvalidArgumentException
     */
    public function shouldFailForInvalidCardNumber($cardNumber, $cardType)
    {
        $method = new ReflectionMethod(CreditCard::class, 'validateCardNumber');
        $method->setAccessible(true);
        $method->invoke(new CreditCard(
            $cardNumber,
            '12',
            date('Y'),
            '123',
            $cardType,
            $this->faker->name
        ));
    }

    public function validCardNumberDataProvider()
    {
        $faker = Faker\Factory::create();

        return [
            [$faker->creditCardNumber(self::$fakerZendValidatorCardTypes[CreditCardValidator::VISA]), CreditCardValidator::VISA],
            [$faker->creditCardNumber(self::$fakerZendValidatorCardTypes[CreditCardValidator::MASTERCARD]), CreditCardValidator::MASTERCARD],
            [$faker->creditCardNumber(self::$fakerZendValidatorCardTypes[CreditCardValidator::AMERICAN_EXPRESS]), CreditCardValidator::AMERICAN_EXPRESS]
        ];
    }

    public function invalidCardNumberDataProvider()
    {
        return [
            ['a23', CreditCardValidator::VISA],
            ['123c', CreditCardValidator::AMERICAN_EXPRESS],
            ['1234', CreditCardValidator::VISA],
            ['234', CreditCardValidator::AMERICAN_EXPRESS],
            ['23', CreditCardValidator::VISA],
            ['12345', CreditCardValidator::AMERICAN_EXPRESS]
        ];
    }



    //

    /**
     * @test
     * @param string $cvv
     * @param string $cardType
     * @dataProvider validCardVerificationValueDataProvider
     */
    public function shouldPassValidateCardVerificationValue($cvv, $cardType)
    {
        $method = new ReflectionMethod(CreditCard::class, 'validateCardVerificationValue');
        $method->setAccessible(true);
        $result = $method->invoke(new CreditCard(
            '0000-0000-0000-0000',
            '12',
            date('Y'),
            $cvv,
            $cardType,
            $this->faker->name
        ));
        $this->assertTrue($result);
    }

    /**
     * @test
     * @param string $cvv
     * @param string $cardType
     * @dataProvider invalidCardVerificationValueDataProvider
     * @expectedException InvalidArgumentException
     */
    public function shouldFailForInvalidCardVerificationValue($cvv, $cardType)
    {
        $method = new ReflectionMethod(CreditCard::class, 'validateCardVerificationValue');
        $method->setAccessible(true);
        $method->invoke(new CreditCard(
            '0000-0000-0000-0000',
            '12',
            date('Y'),
            $cvv,
            $cardType,
            $this->faker->name
        ));
    }

    public function validCardVerificationValueDataProvider()
    {
        return [
            ['123', CreditCardValidator::VISA],
            ['1234', CreditCardValidator::AMERICAN_EXPRESS],
            ['023', CreditCardValidator::VISA],
            ['0234', CreditCardValidator::AMERICAN_EXPRESS]
        ];
    }

    public function invalidCardVerificationValueDataProvider()
    {
        return [
            ['a23', CreditCardValidator::VISA],
            ['123c', CreditCardValidator::AMERICAN_EXPRESS],
            ['1234', CreditCardValidator::VISA],
            ['234', CreditCardValidator::AMERICAN_EXPRESS],
            ['23', CreditCardValidator::VISA],
            ['12345', CreditCardValidator::AMERICAN_EXPRESS]
        ];
    }



    /**
     * @test
     */
    public function shouldPassValidNames()
    {
        $method = new ReflectionMethod(CreditCard::class, 'validateNameOnCard');
        $method->setAccessible(true);
        $result = $method->invoke(new CreditCard(
            '0000-0000-0000-0000',
            '12',
            date('Y'),
            '123',
            'VISA',
            $this->faker->name
        ));
        $this->assertTrue($result);
    }

    /**
     * @test
     * @param $name
     * @dataProvider invalidNameDataProvider
     * @expectedException InvalidArgumentException
     */
    public function shouldFailForInvalidNames($name)
    {
        $method = new ReflectionMethod(CreditCard::class, 'validateNameOnCard');
        $method->setAccessible(true);
        $method->invoke(new CreditCard(
            '0000-0000-0000-0000',
            '12',
            date('Y'),
            '123',
            'VISA',
            $name
        ));
    }


    public function invalidNameDataProvider()
    {
        return [
            [''],
            [' '],
            ["\n"],
            ["\t"],
        ];
    }

    /**
     * @test
     * @param string $month
     * @param string $year
     * @dataProvider validExpireDateDataProvider
     */
    public function shouldPassValidExpireDates($month, $year)
    {

        $method = new ReflectionMethod(CreditCard::class, 'validateExpireDates');
        $method->setAccessible(true);
        $result = $method->invoke(new CreditCard(
            '0000-0000-0000-0000',
            $month,
            $year,
            '123',
            'VISA',
            'Jon Doe'
        ));
        $this->assertTrue($result);
    }

    /**
     * @test
     * @param string $month
     * @param string $year
     * @dataProvider invalidExpireDateDataProvider
     * @expectedException InvalidArgumentException
     */
    public function shouldFailForInvalidExpireDates($month, $year)
    {

        $method = new ReflectionMethod(CreditCard::class, 'validateExpireDates');
        $method->setAccessible(true);
        $method->invoke(new CreditCard(
            '0000-0000-0000-0000',
            $month,
            $year,
            '123',
            'VISA',
            'Jon Doe'
        ));
    }

    public function validExpireDateDataProvider()
    {
        return [
            ['01', date('Y')],
            ['12', date('Y')],
            ['12','2030'],
        ];
    }

    public function invalidExpireDateDataProvider()
    {
        return [
            ['13', date('Y')],
            ['12','2016'],
            ['2', date('Y')],
            ['12', '201'],
            ['a2', '2030'],
            ['02', '203b'],
        ];
    }
}