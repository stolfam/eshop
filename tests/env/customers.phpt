<?php
    require __DIR__ . "/../bootstrap.php";

    $phone = new \Stolfam\Eshop\Env\Customers\Phone("+420777123456");

    \Tester\Assert::same(true, \Stolfam\Eshop\Env\Customers\Phone::isValid($phone));

    $phone = new \Stolfam\Eshop\Env\Customers\Phone("777 123 456");

    \Tester\Assert::same(true, \Stolfam\Eshop\Env\Customers\Phone::isValid($phone));

    $phone = new \Stolfam\Eshop\Env\Customers\Phone("+420 777 123 456");

    \Tester\Assert::same(true, \Stolfam\Eshop\Env\Customers\Phone::isValid($phone));

    $customerDef = new \Stolfam\Eshop\Env\Customers\CustomerDef(new \Stolfam\Env\Person\Name("Jan Novák"),
        new \Stolfam\Env\Person\Email("jan.novak@email.cz"), $phone,
        new \Stolfam\Eshop\Env\Customers\Address(1, 1, "Nová 1", "Praha", "12000", "Česká Republika"));