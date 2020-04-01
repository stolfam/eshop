<?php

    namespace Stolfam\Eshop\Env\Orders;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class OrderList
     * @package Stolfam\Eshop\Env\Orders
     */
    class OrderList extends BaseArray
    {
        /**
         * @param Order $order
         * @return OrderList
         */
        public function add($order)
        {
            $this->items[$order->id] = $order;

            return $this;
        }

        /**
         * @return Order
         */
        public function current(): Order
        {
            return parent::current();
        }

        /**
         * @param $orderId
         * @return Order|null
         */
        public function get($orderId): ?Order
        {
            return parent::get($orderId);
        }

        /**
         * @param OrderList $orderList
         * @return OrderList
         */
        public function insert($orderList)
        {
            parent::insert($orderList);

            return $this;
        }
    }