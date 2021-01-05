<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Cart;

    use Stolfam\Arrays\BaseArray;

    /**
     * Class CartItemList
     *
     * @package Stolfam\Eshop\Env\Cart
     */
    class CartItemList extends BaseArray
    {
        /**
         * @param CartItem $cartItem
         *
         * @return CartItemList
         */
        public function add($cartItem)
        {
            $this->items[] = $cartItem;

            return $this;
        }

        /**
         * @return CartItem
         */
        public function current(): CartItem
        {
            return parent::current();
        }

        /**
         * @param int $cartItemId
         *
         * @return CartItem
         */
        public function get($cartItemId): CartItem
        {
            return parent::get($cartItemId);
        }
    }