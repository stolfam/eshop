<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\ShippingMethods;

    use Stolfam\Arrays\BaseArray;


    /**
     * Class ShippingMethodList
     * @package Stolfam\Eshop\Env\ShippingMethods
     */
    class ShippingMethodList extends BaseArray
    {
        /**
         * @param IShippingMethod $shippingMethod
         * @return ShippingMethodList
         */
        public function add($shippingMethod): ShippingMethodList
        {
            $this->items[$shippingMethod->getId()] = $shippingMethod;

            return $this;
        }

        /**
         * @return IShippingMethod|null
         */
        public function current(): ?IShippingMethod
        {
            return parent::current();
        }

        /**
         * @param int $shippingMethodId
         * @return IShippingMethod|null
         */
        public function get($shippingMethodId): ?IShippingMethod
        {
            return parent::get($shippingMethodId);
        }
    }