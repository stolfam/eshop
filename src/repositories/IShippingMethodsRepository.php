<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Stolfam\Eshop\Env\ShippingMethods\IShippingMethod;
    use Stolfam\Eshop\Env\ShippingMethods\ShippingMethodList;


    /**
     * Interface IShippingMethodsRepository
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface IShippingMethodsRepository
    {
        public function getShippingMethod(int $shippingMethodId): IShippingMethod;

        public function listShippingMethods(): ShippingMethodList;
    }