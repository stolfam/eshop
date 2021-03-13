<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Products;

    use Nette\SmartObject;
    use Stolfam\Arrays\BaseArray;
    use Stolfam\Eshop\Utils\Currency;
    use Stolfam\Eshop\Utils\Price;


    /**
     * Class ProductList
     *
     * @package Stolfam\Eshop\Env\Products
     * @property-read Price $price
     */
    class ProductList extends BaseArray
    {
        use SmartObject;


        /**
         * @param Product $product
         *
         * @return ProductList
         */
        public function add($product): ProductList
        {
            parent::add($product);

            return $this;
        }

        /**
         * @return Product|null
         */
        public function current(): ?Product
        {
            return parent::current();
        }

        /**
         * @return Price
         */
        public function getPrice(): Price
        {
            $price = new Price(0, Currency::getDefaultCurrency());
            foreach ($this as $product) {
                $price->plus($product->price);
            }

            return $price;
        }
    }