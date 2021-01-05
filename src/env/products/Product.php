<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Products;

    use Stolfam\Eshop\Utils\Price;
    use Stolfam\Interfaces\IdentifiableByInteger;
    use Stolfam\Traits\IdentifiedByInteger;

    /**
     * Class Product
     *
     * @package Stolfam\Eshop\Env\Products
     */
    class Product extends ProductDef implements IdentifiableByInteger
    {
        use IdentifiedByInteger;

        /**
         * Product constructor.
         *
         * @param int    $id
         * @param string $name
         * @param Price  $price
         * @param int    $quantity
         */
        public function __construct(int $id, string $name, Price $price, int $quantity = 0)
        {
            parent::__construct($name, $price, $quantity);
            $this->id = $id;
        }

        public function toApiArray(): array
        {
            return [
                'id'         => $this->id,
                'name'       => $this->name,
                'price'      => $this->price->toApiArray(),
                'quantity'   => $this->quantity,
                'attributes' => $this->attributes->toApiArray()
            ];
        }
    }