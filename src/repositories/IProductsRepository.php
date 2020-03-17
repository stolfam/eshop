<?php

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Ataccama\Common\Env\IEntry;
    use Nette\Utils\Paginator;
    use Stolfam\Eshop\Env\Products\Product;
    use Stolfam\Eshop\Env\Products\ProductDef;
    use Stolfam\Eshop\Env\Products\ProductList;


    /**
     * Class IProductsRepository
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface IProductsRepository
    {
        public function getProduct(IEntry $product): Product;

        public function createProduct(ProductDef $productDef): Product;

        public function listProducts(Paginator &$paginator = null): ProductList;

        public function deleteProduct(IEntry $product): bool;

        public function updateProduct(Product $product): Product;
    }