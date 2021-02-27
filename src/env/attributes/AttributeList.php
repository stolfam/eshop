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

        /**
         * Tries to find a value of attribute and returns it or null.
         *
         * @param int $attributeValueId
         * @return IAttributeValue|null
         */
        public function findValue(int $attributeValueId): ?IAttributeValue
        {
            foreach ($this as $attribute) {
                $value = $attribute->getValues()
                    ->get($attributeValueId);
                if (!empty($value)) {
                    return $value;
                }
            }

            return null;
        }

        /**
         * @param int $attributeValueId
         * @return IAttribute|null
         */
        public function findAttributeOfValue(int $attributeValueId): ?IAttribute
        {
            foreach ($this as $attribute) {
                $value = $attribute->getValues()
                    ->get($attributeValueId);
                if (!empty($value)) {
                    $a = clone $attribute;
                    $a->getValues()
                        ->clear();
                    $a->getValues()
                        ->add($value);

                    return $a;
                }
            }

            return null;
        }
    }