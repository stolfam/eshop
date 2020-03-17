<?php

    namespace Stolfam\Eshop\Env\Attributes;

    use Ataccama\Common\Env\BaseArray;
    use Ataccama\Common\Env\IApiArray;


    /**
     * Class AttributeList
     * @package Stolfam\Eshop\Env\Attributes
     */
    class AttributeList extends BaseArray implements IApiArray
    {
        /**
         * @param IAttribute $attribute
         * @return AttributeList
         */
        public function add($attribute)
        {
            $this->items[] = $attribute;

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
         * @param $i
         * @return IAttribute
         */
        public function get($i): IAttribute
        {
            return parent::get($i);
        }

        public function toApiArray(): array
        {
            $arr = [];
            foreach ($this as $attribute) {
                $arr[] = $attribute->toApiArray();
            }

            return $arr;
        }
    }