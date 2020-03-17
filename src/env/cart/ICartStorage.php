<?php

    namespace Stolfam\Eshop\Env\Cart;

    /**
     * Interface ICartStorage
     * @package Stolfam\Eshop\Env\Cart
     */
    interface ICartStorage
    {
        public function save(string $id, CartItemList $products): bool;

        public function load(string $id): CartItemList;
    }