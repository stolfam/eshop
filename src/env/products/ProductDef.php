<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Products;

    use Stolfam\Eshop\Env\Attributes\AttributeList;
    use Stolfam\Eshop\Env\Tags\TagList;
    use Stolfam\Eshop\Utils\Price;
    use Stolfam\Interfaces\IStorable;
    use Stolfam\Table\FloatColumn;
    use Stolfam\Table\IntegerColumn;
    use Stolfam\Table\NullableStringColumn;
    use Stolfam\Table\Row;
    use Stolfam\Table\StringColumn;


    /**
     * Class ProductDef
     *
     * @package Stolfam\Eshop\Env\Products
     */
    class ProductDef implements IStorable
    {
        public string $name;
        public Price $price;
        public int $quantity;
        public AttributeList $attributes;
        public TagList $tags;
        public ?string $htmlDescription;
        public ?string $shortDescription;

        /**
         * ProductDef constructor.
         *
         * @param string       $name
         * @param Price        $price
         * @param int          $quantity
         * @param TagList|null $tagList
         */
        public function __construct(string $name, Price $price, int $quantity = 0, ?TagList $tagList = null)
        {
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;

            $this->attributes = new AttributeList();
            if (isset($tagList)) {
                $this->tags = $tagList;
            } else {
                $this->tags = new TagList();
            }
        }

        public function toRow(): Row
        {
            return new Row([
                new StringColumn("name", $this->name),
                new FloatColumn("price", $this->price->value),
                new IntegerColumn("quantity", $this->quantity),
                new IntegerColumn("currency_id", $this->price->currency->id),
                new NullableStringColumn("html_description", $this->htmlDescription),
                new NullableStringColumn("short_description", $this->shortDescription),
            ]);
        }
    }