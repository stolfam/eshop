<?php

    namespace Stolfam\Eshop\Env\Orders;

    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Utils\Comparator\Comparable;
    use Nette\Utils\DateTime;


    /**
     * Interface Status
     * @package Stolfam\Eshop\Env\Orders
     */
    abstract class Status implements IEntry, Comparable
    {
        public abstract function getTitle(): string;

        public abstract function getDate(): DateTime;

        public function getValue(): int
        {
            return $this->getDate()
                ->getTimestamp();
        }
    }