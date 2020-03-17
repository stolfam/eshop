<?php

    namespace Stolfam\Eshop\Env\Products;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class ProductList
     * @package Stolfam\Eshop\Env\Products
     */
    class ProductList extends BaseArray
    {
        /**
         * @param Product $product
         * @return ProductList
         */
        public function add($product)
        {
            parent::add($product);

            return $this;
        }

        /**
         * @return Product
         */
        public function current(): Product
        {
            return parent::current();
        }
    }