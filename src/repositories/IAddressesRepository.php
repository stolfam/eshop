<?php

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Ataccama\Common\Env\IEntry;
    use Stolfam\Eshop\Env\Customers\Address;
    use Stolfam\Eshop\Env\Customers\AddressDef;


    /**
     * Interface IAddressesRepository
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface IAddressesRepository
    {
        public function getAddress(IEntry $address): Address;

        public function updateAddress(Address $address): Address;

        public function createAddress(AddressDef $address): Address;

        public function deleteAddress(IEntry $address): bool;
    }