<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Test\Implementations;

    use Nette\Utils\Paginator;
    use Stolfam\Eshop\Env\Products\Filter;
    use Stolfam\Eshop\Env\Products\Product;
    use Stolfam\Eshop\Env\Products\ProductDef;
    use Stolfam\Eshop\Env\Products\ProductList;
    use Stolfam\Eshop\Repositories\Interfaces\IProductsRepository;
    use Stolfam\Eshop\Utils\Currency;
    use Stolfam\Eshop\Utils\Price;


    /**
     * Class TestProductsRepository
     * @package Stolfam\Eshop\Test\Implementations
     */
    final class TestProductsRepository implements IProductsRepository
    {
        public function getProduct(int $productId): Product
        {
            return new Product($productId, "Test Product", new Price(9.99, Currency::czk()), 10);
        }

        public function createProduct(ProductDef $productDef): Product
        {
            return $this->getProduct(rand(1, 99));
        }

        public function listProducts(?Filter $filter = null, ?Paginator &$paginator = null): ProductList
        {
            return new ProductList();
        }

        public function deleteProduct(int $productId): bool
        {
            return false;
        }

        public function updateProduct(Product $product): Product
        {
            return $this->getProduct($product->id);
        }
    }