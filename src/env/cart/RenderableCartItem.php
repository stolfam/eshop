<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Cart;

    use Nette\SmartObject;
    use Stolfam\Eshop\Env\Products\Product;


    /**
     * Class PrintableCartItem
     *
     * @package Stolfam\Eshop\Env\Cart
     * @property-read bool $available
     */
    class RenderableCartItem
    {
        use SmartObject;

        public Product $product;
        public int $quantity;

        /**
         * CartItem constructor.
         *
         * @param Product $product
         * @param int     $quantity
         */
        public function __construct(Product $product, int $quantity = 1)
        {
            $this->product = $product;
            $this->quantity = $quantity;
        }

        /**
         * @return bool
         */
        public function isAvailable(): bool
        {
            return $this->product->quantity >= $this->quantity;
        }
    }