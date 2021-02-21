<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Stolfam\Eshop\Env\Customers\Address;
    use Stolfam\Eshop\Env\Customers\AddressDef;
    use Stolfam\Eshop\Env\Customers\AddressList;


    /**
     * Interface IAddressesRepository
     *
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface IAddressesRepository
    {
        /**
         * @param int $addressId
         *
         * @return Address
         */
        public function getAddress(int $addressId): Address;

        /**
         * @param Address $address
         *
         * @return Address
         */
        public function updateAddress(Address $address): Address;

        /**
         * @param AddressDef $address
         *
         * @return Address
         */
        public function createAddress(AddressDef $address): Address;

        /**
         * @param int $addressId
         *
         * @return bool
         */
        public function deleteAddress(int $addressId): bool;

        /**
         * @param int $customerId
         *
         * @return AddressList
         */
        public function listAddressesByCustomer(int $customerId): AddressList;
    }