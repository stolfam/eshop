<?php

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Ataccama\Common\Env\IEntry;
    use Stolfam\Eshop\Env\Customers\Customer;
    use Stolfam\Eshop\Env\Customers\CustomerDef;


    /**
     * Interface ICustomersRepository
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface ICustomersRepository
    {
        public function getCustomer(IEntry $customer): Customer;

        public function createCustomer(CustomerDef $customerDef): Customer;

        public function updateCustomer(Customer $customer): Customer;

        public function deleteCustomer(IEntry $customer): bool;
    }