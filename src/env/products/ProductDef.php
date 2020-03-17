<?php

    namespace Stolfam\Eshop\Env\Products;

    use Ataccama\Common\Env\Arrays\StringPair;
    use Ataccama\Common\Env\Arrays\StringPairArray;
    use Ataccama\Common\Env\Storable;
    use Stolfam\Eshop\Env\Attributes\AttributeList;
    use Stolfam\Eshop\Env\Deals\Currency;
    use Stolfam\Eshop\Env\Deals\Price;
    use Stolfam\Eshop\Env\Tags\TagList;


    /**
     * Class ProductDef
     * @package Stolfam\Eshop\Env\Products
     */
    class ProductDef implements Storable
    {
        public string $name;
        public Price $price;
        public int $quantity;
        public AttributeList $attributes;
        public TagList $tags;

        /**
         * ProductDef constructor.
         * @param string       $name
         * @param Price        $price
         * @param int          $quantity
         * @param TagList|null $tagList
         */
        public function __construct(string $name, Price $price = null, int $quantity = 0, ?TagList $tagList = null)
        {
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;

            if (!isset($price)) {
                $this->price = new Price(0, Currency::czk());
            }

            $this->attributes = new AttributeList();
            if (isset($tagList)) {
                $this->tags = $tagList;
            } else {
                $this->tags = new TagList();
            }
        }

        public function toPairs(): StringPairArray
        {
            return new StringPairArray([
                new StringPair("name", $this->name),
                new StringPair("price", $this->price->value),
                new StringPair("currency_id", $this->price->currency->id)
            ]);
        }
    }