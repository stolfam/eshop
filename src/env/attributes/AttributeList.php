<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Attributes;

    use Stolfam\Arrays\BaseArray;

    /**
     * Class AttributeList
     *
     * @package Stolfam\Eshop\Env\Attributes
     */
    class AttributeList extends BaseArray
    {
        /**
         * @param IAttribute $attribute
         *
         * @return AttributeList
         */
        public function add($attribute)
        {
            $this->items[$attribute->getId()] = $attribute;

            return $this;
        }

        /**
         * @return IAttribute
         */
        public function current(): IAttribute
        {
            return parent::current();
        }

        /**
         * @param $id
         *
         * @return IAttribute
         */
        public function get($id): IAttribute
        {
            return parent::get($id);
        }

        public function toApiArray(): array
        {
            $arr = [];
            foreach ($this as $attribute) {
                $arr[$attribute->getId()] = $attribute->toApiArray();
            }

            return $arr;
        }
    }