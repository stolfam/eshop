<?php
    require __DIR__ . "/../bootstrap.php";

    $attributeList = new \Stolfam\Eshop\Env\Attributes\AttributeList();
    $attributeList->add(new class implements \Stolfam\Eshop\Env\Attributes\IAttribute {
        public function toApiArray(): array
        {
            return [
                "id"     => $this->getId(),
                "name"   => $this->getName(),
                "values" => $this->getValues()
                    ->toApiArray()
            ];
        }

        public function getName(): string
        {
            return "Size";
        }

        public function getValues(): \Stolfam\Eshop\Env\Attributes\ValueList
        {
            $values = new \Stolfam\Eshop\Env\Attributes\ValueList();

            $values->add(new class implements \Stolfam\Eshop\Env\Attributes\IAttributeValue {
                public function getName(): string
                {
                    return "XS";
                }

                public function getId(): int
                {
                    return 1;
                }
            });

            $values->add(new class implements \Stolfam\Eshop\Env\Attributes\IAttributeValue {
                public function getName(): string
                {
                    return "XXL";
                }

                public function getId(): int
                {
                    return 2;
                }
            });

            return $values;
        }

        public function getId(): int
        {
            return 1;
        }
    });

    \Tester\Assert::same("Size", $attributeList->get(1)->getName());
    \Tester\Assert::same("XS", $attributeList->get(1)->getValues()->get(1)->getName());
    \Tester\Assert::same("XXL", $attributeList->get(1)->getValues()->get(2)->getName());