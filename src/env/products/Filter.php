<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Products;

    use Nette\Utils\DateTime;
    use Stolfam\Eshop\Utils\Price;


    /**
     * Class Filter
     * @package Stolfam\Eshop\Env\Products
     */
    class Filter
    {
        const TAG_IDS = "tag_id";
        const NAME = "name";
        const PRICE_FROM = "price_from";
        const PRICE_TO = "price_to";
        const DATE_CREATED_START = "date_start";
        const QUANTITY_MORE_THAN = "quantity";

        /** @var int[]|null */
        public array $tagIds;

        /** @var string|null */
        public ?string $name;

        /** @var DateTime|null */
        public ?DateTime $dateStart;

        /** @var Price|null */
        public ?Price $priceFrom;

        /** @var Price|null */
        public ?Price $priceTo;

        /** @var int|null */
        public ?int $quantity;

        /**
         * Filter constructor.
         * @param array $params
         */
        public function __construct(array $params)
        {
            if (isset($params[self::DATE_CREATED_START])) {
                if ($params[self::DATE_CREATED_START] instanceof DateTime) {
                    $this->dateStart = $params[self::DATE_CREATED_START];
                } else {
                    $this->dateStart = DateTime::from($params[self::DATE_CREATED_START]);
                }
            }

            if (empty($params[self::NAME])) {
                $this->name = (string) $params[self::NAME];
            }

            if (isset($params[self::TAG_IDS]) && is_array($params[self::TAG_IDS])) {
                $this->tagIds = [];
                foreach ($params[self::TAG_IDS] as $tagId) {
                    $this->tagIds[] = (int) $tagId;
                }
            }

            if (isset($params[self::PRICE_FROM]) && $params[self::PRICE_FROM] instanceof Price) {
                $this->priceFrom = $params[self::PRICE_FROM];
            }

            if (isset($params[self::PRICE_TO]) && $params[self::PRICE_TO] instanceof Price) {
                $this->priceTo = $params[self::PRICE_TO];
            }

            if (isset($params[self::QUANTITY_MORE_THAN])) {
                $this->quantity = (int) $params[self::QUANTITY_MORE_THAN];
            }
        }
    }