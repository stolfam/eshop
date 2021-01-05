<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Attributes;

    use Stolfam\Arrays\BaseArray;

    /**
     * Class AttributeSet
     *
     * @package Stolfam\Eshop\Env\Attributes
     */
    class ValueList extends BaseArray
    {
        /**
         * @param IAttributeValue $value
         *
         * @return ValueList
         */
        public function add($value)
        {
            $this->items[$value->getId()] = $value;

            return $this;
        }

        /**
         * @return IAttributeValue
         */
        public function current(): IAttributeValue
        {
            return parent::current();
        }

        /**
         * @param $valueId
         *
         * @return IAttributeValue
         */
        public function get($valueId): IAttributeValue
        {
            return parent::get($valueId);
        }

        /**
         * @param ValueList $valueList
         *
         * @return ValueList
         */
        public function insert($valueList)
        {
            parent::insert($valueList);

            return $this;
        }

        public function toApiArray(): array
        {
            $array = [];
            foreach ($this as $value) {
                $array[$value->getId()] = $value->getName();
            }

            return $array;
        }
    }