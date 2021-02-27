<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\PaymentMethods;

    use Stolfam\Eshop\Utils\Price;
    use Stolfam\Interfaces\IdentifiableByInteger;


    /**
     * Interface IPaymentMethod
     * @package Stolfam\Eshop\Env\PaymentMethods
     */
    interface IPaymentMethod extends IdentifiableByInteger
    {
        public function getName(): string;

        public function getPrice(): Price;
    }