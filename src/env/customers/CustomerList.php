<?php

    namespace Stolfam\Eshop\Env\Customers;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class CustomerList
     * @package Stolfam\Eshop\Env\Customers
     */
    class CustomerList extends BaseArray
    {
        /**
         * @param Customer $customer
         * @return CustomerList
         */
        public function add($customer)
        {
            $this->items[$customer->id] = $customer;

            return $this;
        }

        /**
         * @return Customer
         */
        public function current(): Customer
        {
            return parent::current();
        }

        /**
         * @param $customerId
         * @return Customer|null
         */
        public function get($customerId): ?Customer
        {
            return parent::get($customerId);
        }

        /**
         * @param CustomerList $customerList
         * @return CustomerList
         */
        public function insert($customerList)
        {
            parent::insert($customerList);

            return $this;
        }
    }