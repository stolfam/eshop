<?php
    require __DIR__ . "/../bootstrap.php";

    require_once __DIR__ . "/../implementations/CartStorage.php";

    $productsRepository = new class implements \Stolfam\Eshop\Repositories\Interfaces\IProductsRepository {
        /** @var \Stolfam\Eshop\Env\Products\ProductList */
        private $products;

        /**
         *  constructor.
         */
        public function __construct()
        {
            $this->products = new \Stolfam\Eshop\Env\Products\ProductList();
        }

        public function getProduct(\Ataccama\Common\Env\IEntry $product): \Stolfam\Eshop\Env\Products\Product
        {
            foreach ($this->products as $p) {
                if ($p->id == $product->id) {
                    return $p;
                }
            }
        }

        public function createProduct(\Stolfam\Eshop\Env\Products\ProductDef $productDef
        ): \Stolfam\Eshop\Env\Products\Product {
            $index = $this->products->count() + 1;
            $product = new \Stolfam\Eshop\Env\Products\Product($index, $productDef->name, $productDef->price,
                $productDef->quantity);
            $this->products->add($product);

            return $product;
        }

        public function listProducts(\Nette\Utils\Paginator &$paginator = null): \Stolfam\Eshop\Env\Products\ProductList
        {
            return $this->products;
        }

        public function deleteProduct(\Ataccama\Common\Env\IEntry $product): bool
        {
            return $this->products->remove($product->id);
        }

        public function updateProduct(\Stolfam\Eshop\Env\Products\Product $product): \Stolfam\Eshop\Env\Products\Product
        {
            return $product;
        }
    };

    $productDef = new \Stolfam\Eshop\Env\Products\ProductDef("product",
        new \Stolfam\Eshop\Env\Deals\Price(199, \Stolfam\Eshop\Env\Deals\Currency::czk()), 10);

    $product = $productsRepository->createProduct($productDef);

    \Tester\Assert::same("product", $product->name);

    \Tester\Assert::count(1, $productsRepository->listProducts());

    \Tester\Assert::same(199, $productsRepository->getProduct(new \Ataccama\Common\Env\Entry(1))->price->value);

    \Tester\Assert::same(" Kč",
        $productsRepository->getProduct(new \Ataccama\Common\Env\Entry(1))->price->currency->symbol->after);

    $cart = new \Stolfam\Eshop\Env\Cart\Cart(new \Stolfam\Eshop\Test\Implementations\CartStorage());

    $cart->addProduct($product);

    $list = $cart->listPrintableProducts($productsRepository);

    \Tester\Assert::same("product", $list->get(0)->product->name);

    \Tester\Assert::same(true, $list->get(0)->available);

    \Tester\Assert::same(199, $list->get(0)->product->price->value);