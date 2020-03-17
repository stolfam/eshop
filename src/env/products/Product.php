<?php

    namespace Stolfam\Eshop\Env\Products;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IApiArray;
    use Ataccama\Common\Env\IEntry;
    use Stolfam\Eshop\Env\Deals\Price;


    /**
     * Class Product
     * @package Stolfam\Eshop\Env\Products
     */
    class Product extends ProductDef implements IEntry, IApiArray
    {
        use BaseEntry;

        /**
         * Product constructor.
         * @param int        $id
         * @param string     $name
         * @param Price|null $price
         * @param int        $quantity
         */
        public function __construct(int $id, string $name, ?Price $price = null, int $quantity = 0)
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