<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Orders;

    use Stolfam\Arrays\BaseArray;

    /**
     * Class OrderList
     *
     * @package Stolfam\Eshop\Env\Orders
     */
    class OrderList extends BaseArray
    {
        /**
         * @param Order $order
         *
         * @return OrderList
         */
        public function add($order): OrderList
        {
            $this->items[$order->id] = $order;

            return $this;
        }

        /**
         * @return Order|null
         */
        public function current(): ?Order
        {
            return parent::current();
        }

        /**
         * @param int $orderId
         *
         * @return Order|null
         */
        public function get($orderId): ?Order
        {
            return parent::get($orderId);
        }

        /**
         * @param OrderList $orderList
         *
         * @return OrderList
         */
        public function insert($orderList): OrderList
        {
            parent::insert($orderList);

            return $this;
        }
    }