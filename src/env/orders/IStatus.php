<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Orders;

    use Nette\Utils\DateTime;
    use Stolfam\Interfaces\IdentifiableByInteger;


    /**
     * Interface Status
     *
     * @package Stolfam\Eshop\Env\Orders
     */
    abstract class Status implements IdentifiableByInteger
    {
        public abstract function getTitle(): string;

        public abstract function getDate(): DateTime;
    }