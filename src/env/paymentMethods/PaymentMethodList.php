<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\PaymentMethods;

    use Stolfam\Arrays\BaseArray;
    use Stolfam\Arrays\PairArray;
    use Stolfam\Env\Pair;


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

        public function toPairArray(): PairArray
        {
            $pairs = new PairArray();
            foreach ($this as $paymentMethod) {
                $pairs->add(new Pair($paymentMethod->getId(), $paymentMethod->getName()));
            }

            return $pairs;
        }

        public function toArray(): array
        {
            $items = [];
            foreach ($this as $paymentMethod) {
                $items[$paymentMethod->getId()] = $paymentMethod;
            }

            return $items;
        }
    }