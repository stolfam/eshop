<?php

    namespace Stolfam\Eshop\Env\Cart;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class PrintableCartItemList
     * @package Stolfam\Eshop\Env\Cart
     */
    class PrintableCartItemList extends BaseArray
    {
        /**
         * @param PrintableCartItem $printableCartItem
         * @return BaseArray
         */
        public function add($printableCartItem)
        {
            return parent::add($printableCartItem);
        }

        /**
         * @return PrintableCartItem
         */
        public function current(): PrintableCartItem
        {
            return parent::current();
        }

        /**
         * @param int $cartItemId
         * @return PrintableCartItem
         */
        public function get($cartItemId): PrintableCartItem
        {
            return parent::get($cartItemId);
        }
    }