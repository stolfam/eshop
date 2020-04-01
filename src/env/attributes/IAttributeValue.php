<?php

    namespace Stolfam\Eshop\Env\Attributes;

    use Ataccama\Common\Env\IEntry;


    /**
     * Interface AttributeValue
     * @package Stolfam\Eshop\Env\Attributes
     */
    interface IAttributeValue extends IEntry
    {
        public function getName(): string;
    }