<?php

    namespace Stolfam\Eshop\Env\Cart;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class RenderableCartItemList
     * @package Stolfam\Eshop\Env\Cart
     */
    class RenderableCartItemList extends BaseArray
    {
        /**
         * @param RenderableCartItem $printableCartItem
         * @return BaseArray
         */
        public function add($printableCartItem)
        {
            return parent::add($printableCartItem);
        }

        /**
         * @return RenderableCartItem
         */
        public function current(): RenderableCartItem
        {
            return parent::current();
        }

        /**
         * @param int $cartItemId
         * @return RenderableCartItem
         */
        public function get($cartItemId): RenderableCartItem
        {
            return parent::get($cartItemId);
        }
    }