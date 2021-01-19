<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Nette\Utils\Paginator;
    use Stolfam\Eshop\Env\Products\Filter;
    use Stolfam\Eshop\Env\Products\Product;
    use Stolfam\Eshop\Env\Products\ProductDef;
    use Stolfam\Eshop\Env\Products\ProductList;


    /**
     * Class IProductsRepository
     *
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface IProductsRepository
    {
        /**
         * @param int $productId
         *
         * @return Product
         */
        public function getProduct(int $productId): Product;

        /**
         * @param ProductDef $productDef
         *
         * @return Product
         */
        public function createProduct(ProductDef $productDef): Product;

        /**
         * @param Filter|null    $filter
         * @param Paginator|null $paginator
         * @return ProductList
         */
        public function listProducts(?Filter $filter = null, ?Paginator &$paginator = null): ProductList;

        /**
         * @param int $productId
         *
         * @return bool
         */
        public function deleteProduct(int $productId): bool;

        /**
         * @param Product $product
         *
         * @return Product
         */
        public function updateProduct(Product $product): Product;
    }