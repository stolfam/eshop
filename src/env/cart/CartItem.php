<?php

    namespace Stolfam\Eshop\Env\Cart;

    use Ataccama\Common\Env\IEntry;


    /**
     * Class CartItem
     * @package Stolfam\Eshop\Env\Cart
     */
    class CartItem
    {
        public IEntry $product;
        public int $quantity;

        /**
         * CartItem constructor.
         * @param IEntry $product
         * @param int    $quantity
         */
        public function __construct(IEntry $product, int $quantity = 1)
        {
            $this->product = $product;
            $this->quantity = $quantity;
        }
    }