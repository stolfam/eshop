<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Products;

    use Stolfam\Arrays\BaseArray;


    /**
     * Class ProductList
     *
     * @package Stolfam\Eshop\Env\Products
     */
    class ProductList extends BaseArray
    {
        /**
         * @param Product $product
         *
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