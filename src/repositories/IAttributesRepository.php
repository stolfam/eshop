<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Stolfam\Eshop\Env\Attributes\AttributeList;
    use Stolfam\Eshop\Env\Attributes\IAttribute;


    /**
     * Interface IAttributesRepository
     *
     * @package Stolfam\Eshop\Repositories\Interfaces
     *
     */
    interface IAttributesRepository
    {
        /**
         * @param int $attributeId
         *
         * @return IAttribute
         */
        public function getAttribute(int $attributeId): IAttribute;

        /**
         * @param IAttribute $attribute
         *
         * @return IAttribute
         */
        public function createAttribute(IAttribute $attribute): IAttribute;

        /**
         * @param int $attributeId
         *
         * @return bool
         */
        public function deleteAttribute(int $attributeId): bool;

        /**
         * @param IAttribute $attribute
         *
         * @return IAttribute
         */
        public function updateAttribute(IAttribute $attribute): IAttribute;

        /**
         * @param int $productId
         *
         * @return AttributeList
         */
        public function listProductAttributes(int $productId): AttributeList;

        /**
         * @return AttributeList
         */
        public function listAttributes(): AttributeList;
    }