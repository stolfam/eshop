<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Cart;

    /**
     * Class CartItem
     *
     * @package Stolfam\Eshop\Env\Cart
     */
    class CartItem
    {
        public int $productId;
        public int $quantity = 1;
        public ?array $attributeValueIds;

        /**
         * CartItem constructor.
         *
         * @param int        $productId
         * @param int        $quantity
         * @param int[]|null $attributeValueIds
         */
        public function __construct(int $productId, int $quantity = 1, ?array $attributeValueIds = null)
        {
            $this->productId = $productId;
            $this->quantity = $quantity;
            $this->attributeValueIds = $attributeValueIds;
        }
    }