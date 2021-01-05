<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Cart;

    use Stolfam\Eshop\Env\Attributes\AttributeList;

    /**
     * Class CartItem
     *
     * @package Stolfam\Eshop\Env\Cart
     */
    class CartItem
    {
        public int $productId;
        public int $quantity = 1;
        public ?AttributeList $attributes;

        /**
         * CartItem constructor.
         *
         * @param int                $productId
         * @param int                $quantity
         * @param AttributeList|null $attributes
         */
        public function __construct(int $productId, int $quantity = 1, ?AttributeList $attributes = null)
        {
            $this->productId = $productId;
            $this->quantity = $quantity;
            $this->attributes = $attributes;
        }
    }