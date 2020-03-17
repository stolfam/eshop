<?php

    namespace Stolfam\Eshop\Env\Customers;

    use Ataccama\Common\Env\Arrays\StringPair;
    use Ataccama\Common\Env\Arrays\StringPairArray;
    use Ataccama\Common\Env\Storable;


    /**
     * Class AddressDef
     * @package Stolfam\Eshop\Env\Customers
     *
     * Definition of an address. Use it for creating via IAddressesRepository.
     */
    class AddressDef extends \Ataccama\Common\Env\User\Address implements Storable
    {
        /**
         * Address constructor.
         * @param string      $street
         * @param string      $city
         * @param string      $postcode
         * @param string      $country
         * @param string|null $state
         * @param string|null $additionalDetail
         */
        public function __construct(
            string $street,
            string $city,
            string $postcode,
            string $country,
            ?string $state = null,
            ?string $additionalDetail = null
        ) {
            parent::__construct($street, $city, $postcode, $country, $state, $additionalDetail);
        }

        public function toPairs(): StringPairArray
        {
            return new StringPairArray([
                new StringPair('street', $this->street),
                new StringPair('city', $this->city),
                new StringPair('postcode', $this->postcode),
                new StringPair('country', $this->country),
                new StringPair('state', $this->state),
                new StringPair('additional_detail', $this->additionalDetail),
            ]);
        }
    }