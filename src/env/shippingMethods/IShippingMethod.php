<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\ShippingMethods;

    use Stolfam\Eshop\Utils\Price;
    use Stolfam\Interfaces\IdentifiableByInteger;


    /**
     * Interface IShippingMethod
     * @package Stolfam\Eshop\Env\ShippingMethods
     */
    interface IShippingMethod extends IdentifiableByInteger
    {
        public function getName(): string;

        public function getPrice(): Price;
    }