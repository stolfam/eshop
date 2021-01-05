<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Stolfam\Eshop\Env\Customers\Customer;
    use Stolfam\Eshop\Env\Customers\CustomerDef;


    /**
     * Interface ICustomersRepository
     *
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface ICustomersRepository
    {
        /**
         * @param int $customerId
         *
         * @return Customer
         */
        public function getCustomer(int $customerId): Customer;

        /**
         * @param CustomerDef $customerDef
         *
         * @return Customer
         */
        public function createCustomer(CustomerDef $customerDef): Customer;

        /**
         * @param Customer $customer
         *
         * @return Customer
         */
        public function updateCustomer(Customer $customer): Customer;

        /**
         * @param int $customerId
         *
         * @return bool
         */
        public function deleteCustomer(int $customerId): bool;
    }