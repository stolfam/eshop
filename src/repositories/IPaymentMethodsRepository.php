<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Stolfam\Eshop\Env\PaymentMethods\IPaymentMethod;
    use Stolfam\Eshop\Env\PaymentMethods\PaymentMethodList;


    /**
     * Interface IPaymentMethodsRepository
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface IPaymentMethodsRepository
    {
        public function getPaymentMethod(int $paymentMethodId): IPaymentMethod;

        public function listPaymentMethods(): PaymentMethodList;
    }