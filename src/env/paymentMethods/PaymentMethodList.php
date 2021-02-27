<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\PaymentMethods;

    use Stolfam\Arrays\BaseArray;


    /**
     * Class PaymentMethodList
     * @package Stolfam\Eshop\Env\PaymentMethods
     */
    class PaymentMethodList extends BaseArray
    {
        /**
         * @param IPaymentMethod $paymentMethod
         * @return PaymentMethodList
         */
        public function add($paymentMethod): PaymentMethodList
        {
            $this->items[$paymentMethod->getId()] = $paymentMethod;

            return $this;
        }

        /**
         * @return IPaymentMethod
         */
        public function current(): ?IPaymentMethod
        {
            return parent::current();
        }

        /**
         * @param int $paymentMethodId
         * @return IPaymentMethod|null
         */
        public function get($paymentMethodId): ?IPaymentMethod
        {
            return parent::get($paymentMethodId);
        }
    }