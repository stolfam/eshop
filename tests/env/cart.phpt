<?php
    require __DIR__ . "/../bootstrap.php";

    require_once __DIR__ . "/../implementations/CartStorage.php";
    require_once __DIR__ . "/../implementations/TestProductsRepository.php";

    $productsRepository = new \Stolfam\Eshop\Test\Implementations\TestProductsRepository();
    $cart = new \Stolfam\Eshop\Env\Cart\Cart(new \Stolfam\Eshop\Test\Implementations\CartStorage(),
        $productsRepository);

    $cart->addProduct(1);
    $cart->addProduct(2);

    \Tester\Assert::same(1, $cart->listProducts()
        ->get(0)->productId);
    \Tester\Assert::same(2, $cart->listProducts()
        ->get(1)->productId);

    \Tester\Assert::count(2, $cart->listProducts());

    $cart->removeProduct(0);

    \Tester\Assert::count(1, $cart->listProducts());

    $cart->update(1, 5);

    \Tester\Assert::same(5, $cart->listProducts()
        ->get(1)->quantity);

    $cart->clear();

    \Tester\Assert::count(0, $cart->listProducts());