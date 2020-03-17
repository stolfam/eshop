<?php

    namespace Stolfam\Eshop\Test\Implementations;

    use Stolfam\Eshop\Env\Cart\ICartStorage;


    /**
     * Class CartStorage
     * @package Stolfam\Eshop\Test\Implementations
     */
    class CartStorage implements ICartStorage
    {
        /** @var \Stolfam\Eshop\Env\Cart\CartItemList[] */
        private $storage = [];

        public function save(string $id, \Stolfam\Eshop\Env\Cart\CartItemList $products): bool
        {
            $this->storage[$id] = $products;

            return true;
        }

        public function load(string $id): \Stolfam\Eshop\Env\Cart\CartItemList
        {
            if (isset($this->storage[$id])) {
                return $this->storage[$id];
            }

            return new \Stolfam\Eshop\Env\Cart\CartItemList();
        }
    }