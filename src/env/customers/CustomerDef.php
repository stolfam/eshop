<?php

    namespace Stolfam\Eshop\Env\Customers;

    use Ataccama\Common\Env\Arrays\StringPair;
    use Ataccama\Common\Env\Arrays\StringPairArray;
    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Env\Name;
    use Ataccama\Common\Env\Storable;


    /**
     * Class CustomerDef
     * @package Stolfam\Eshop\Env\Customers
     */
    class CustomerDef implements Storable
    {
        public Name $name;
        public Email $email;
        public ?Phone $phone;
        public ?Address $shippingAddress;
        public ?Address $billingAddress;

        /**
         * CustomerDef constructor.
         * @param Name         $name
         * @param Email        $email
         * @param Phone|null   $phone
         * @param Address|null $shippingAddress
         * @param Address|null $billingAddress
         */
        public function __construct(
            Name $name,
            Email $email,
            ?Phone $phone = null,
            ?Address $shippingAddress = null,
            ?Address $billingAddress = null
        ) {
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->shippingAddress = $shippingAddress;
            $this->billingAddress = $billingAddress;
        }

        public function toPairs(): StringPairArray
        {
            return new StringPairArray([
                new StringPair('name', "$this->name"),
                new StringPair('email', "$this->email"),
                new StringPair('phone', "$this->phone")
            ]);
        }
    }