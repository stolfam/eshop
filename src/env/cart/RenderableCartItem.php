<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Cart;

    use Nette\SmartObject;
    use Stolfam\Eshop\Env\Attributes\AttributeList;
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
        public AttributeList $attributes;

        /**
         * CartItem constructor.
         *
         * @param Product       $product
         * @param int           $quantity
         * @param AttributeList $attributes
         */
        public function __construct(Product $product, int $quantity, AttributeList $attributes)
        {
            $this->product = $product;
            $this->quantity = $quantity;
            $this->attributes = $attributes;
        }

        /**
         * @return bool
         */
        public function isAvailable(): bool
        {
            return $this->product->quantity >= $this->quantity;
        }
    }