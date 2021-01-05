<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Nette\Utils\Paginator;
    use Stolfam\Eshop\Env\Orders\Filter;
    use Stolfam\Eshop\Env\Orders\Order;
    use Stolfam\Eshop\Env\Orders\OrderDef;
    use Stolfam\Eshop\Env\Orders\OrderList;

    /**
     * Interface IOrdersRepository
     *
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface IOrdersRepository
    {
        /**
         * @param int $orderId
         *
         * @return Order
         */
        public function getOrder(int $orderId): Order;

        /**
         * @param OrderDef $orderDef
         *
         * @return Order
         */
        public function createOrder(OrderDef $orderDef): Order;

        /**
         * @param Order $order
         *
         * @return Order
         */
        public function updateOrder(Order $order): Order;

        /**
         * @param int $orderId
         *
         * @return bool
         */
        public function deleteOrder(int $orderId): bool;

        /**
         * @param Filter|null    $filter
         * @param Paginator|null $paginator
         *
         * @return OrderList
         */
        public function listOrder(?Filter $filter = null, ?Paginator &$paginator = null): OrderList;
    }