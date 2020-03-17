<?php

    namespace Stolfam\Eshop\Env\Orders;

    use Ataccama\Common\Env\BaseArray;
    use Ataccama\Common\Utils\Comparator\Sorter;


    /**
     * Class History
     * @package Stolfam\Eshop\Env\Orders
     */
    class History extends BaseArray
    {
        /**
         * @param Status $status
         * @return History
         */
        public function add($status)
        {
            parent::add($status);

            return $this;
        }

        /**
         * @return Status
         */
        public function current(): Status
        {
            return parent::current();
        }

        /**
         * @return Status
         */
        public function getLast(): Status
        {
            $this->sort(Sorter::DESC);

            return $this->current();
        }
    }