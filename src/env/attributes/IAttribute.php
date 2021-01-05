<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Attributes;

    use Stolfam\Interfaces\IdentifiableByInteger;

    /**
     * Interface IAttribute
     *
     * @package Stolfam\Eshop\Env\Attributes
     *
     * An attribute describes a property of a product.
     * For example a size, or a color.
     */
    interface IAttribute extends IdentifiableByInteger
    {
        public function getName(): string;

        public function getValues(): ValueList;

        public function toApiArray(): array;
    }