<?php

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Ataccama\Common\Env\IEntry;
    use Stolfam\Eshop\Env\Attributes\AttributeList;
    use Stolfam\Eshop\Env\Attributes\IAttribute;


    /**
     * Interface IAttributesRepository
     * @package Stolfam\Eshop\Repositories\Interfaces
     *
     */
    interface IAttributesRepository
    {
        public function getAttribute(IEntry $attribute): IAttribute;

        public function createAttribute(IAttribute $attribute): IAttribute;

        public function deleteAttribute(IEntry $attribute): bool;

        public function updateAttribute(IAttribute $attribute): IAttribute;

        public function listAttributes(IEntry $product): AttributeList;
    }