<?php

    namespace Stolfam\Eshop\Env\Customers;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IEntry;


    /**
     * Class Address
     * @package Stolfam\Eshop\Env\Customers
     */
    class Address extends AddressDef implements IEntry
    {
        use BaseEntry;

        /**
         * Address constructor.
         * @param int         $id
         * @param string      $street
         * @param string      $city
         * @param string      $postcode
         * @param string      $country
         * @param string|null $state
         * @param string|null $additionalDetail
         */
        public function __construct(
            int $id,
            string $street,
            string $city,
            string $postcode,
            string $country,
            ?string $state = null,
            ?string $additionalDetail = null
        ) {
            $this->id = $id;
            parent::__construct($street, $city, $postcode, $country, $state, $additionalDetail);
        }
    }