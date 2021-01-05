<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Attributes;

    use Stolfam\Interfaces\IdentifiableByInteger;

    /**
     * Interface AttributeValue
     *
     * @package Stolfam\Eshop\Env\Attributes
     */
    interface IAttributeValue extends IdentifiableByInteger
    {
        public function getName(): string;
    }