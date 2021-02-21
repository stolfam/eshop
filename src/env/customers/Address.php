<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Customers;

    use Stolfam\Interfaces\IdentifiableByInteger;
    use Stolfam\Traits\IdentifiedByInteger;

    /**
     * Class Address
     *
     * @package Stolfam\Eshop\Env\Customers
     */
    class Address extends AddressDef implements IdentifiableByInteger
    {
        use IdentifiedByInteger;


        /**
         * Address constructor.
         *
         * @param int         $id
         * @param int         $customerId
         * @param string      $street
         * @param string      $city
         * @param string      $postcode
         * @param string      $country
         * @param string|null $companyName
         * @param string|null $state
         * @param string|null $additionalDetail
         */
        public function __construct(
            int $id,
            int $customerId,
            string $street,
            string $city,
            string $postcode,
            string $country,
            ?string $companyName = null,
            ?string $state = null,
            ?string $additionalDetail = null)
        {
            parent::__construct($customerId, $street, $city, $postcode, $country, $companyName, $state, $additionalDetail);
            $this->id = $id;
        }
    }