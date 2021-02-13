<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Attributes;

    /**
     * Interface IProductAttributeValue
     * @package Stolfam\Eshop\Env\Attributes
     */
    interface IProductAttributeValue extends IAttributeValue
    {
        public function getQuantity(): int;
    }