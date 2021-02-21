<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Customers;

    use Stolfam\Arrays\BaseArray;


    /**
     * Class AddressList
     * @package Stolfam\Eshop\Env\Customers
     */
    class AddressList extends BaseArray
    {
        /**
         * @param Address $address
         * @return AddressList
         */
        public function add($address)
        {
            $this->items[$address->getId()] = $address;

            return $this;
        }

        public function current(): Address
        {
            return parent::current();
        }
    }