<?php
    require __DIR__ . "/../bootstrap.php";

    require_once __DIR__ . "/../implementations/CartStorage.php";

    $cart = new \Stolfam\Eshop\Env\Cart\Cart(new \Stolfam\Eshop\Test\Implementations\CartStorage());

    $cart->addProduct(new \Ataccama\Common\Env\Entry(1));
    $cart->addProduct(new \Ataccama\Common\Env\Entry(2));

    \Tester\Assert::same('1', $cart->listProducts()
        ->get(0)->product->id);
    \Tester\Assert::same('2', $cart->listProducts()
        ->get(1)->product->id);

    \Tester\Assert::count(2, $cart->listProducts());

    $cart->removeProduct(0);

    \Tester\Assert::count(1, $cart->listProducts());

    $cart->update(1, 5);

    \Tester\Assert::same(5, $cart->listProducts()
        ->get(1)->quantity);

    $cart->clear();

    \Tester\Assert::count(0, $cart->listProducts());