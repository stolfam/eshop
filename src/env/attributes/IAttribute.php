<?php

    namespace Stolfam\Eshop\Env\Attributes;

    use Ataccama\Common\Env\IApiArray;
    use Ataccama\Common\Env\IEntry;


    /**
     * Interface IAttribute
     * @package Stolfam\Eshop\Env\Attributes
     *
     * An attribute describes a property of a product.
     * For example a size, or a color.
     */
    interface IAttribute extends IEntry, IApiArray
    {
        public function getName(): string;

        public function getValues(): ValueList;
    }