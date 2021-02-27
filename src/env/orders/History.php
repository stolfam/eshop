<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Orders;

    use Stolfam\Arrays\BaseArray;


    /**
     * Class History
     *
     * @package Stolfam\Eshop\Env\Orders
     */
    class History extends BaseArray
    {
        /**
         * @param Status $status
         *
         * @return History
         */
        public function add($status): History
        {
            parent::add($status);

            return $this;
        }

        /**
         * @return Status|null
         */
        public function current(): ?Status
        {
            return parent::current();
        }

        public function sortByDate()
        {
            usort($this->items, function (Status $a, Status $b): int {
                return [
                        $b->getDate()
                            ->getTimestamp()
                    ] <=> [
                        $a->getDate()
                            ->getTimestamp()
                    ];
            });
        }

        /**
         * @return Status|null
         */
        public function getLast(): ?Status
        {
            $this->sortByDate();

            return $this->current();
        }
    }