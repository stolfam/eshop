<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Customers;


    /**
     * Class PhoneNumber
     *
     * @package Stolfam\Eshop\Env\Customers
     */
    class Phone
    {
        const CZECH_REGEX = "~^[\+]?[0-9]{0,3}\ ?[0-9]{3}\ ?[0-9]{3}\ ?[0-9]{3}$~";

        /** @var string */
        public string $raw;

        /**
         * PhoneNumber constructor.
         *
         * @param string $raw
         */
        public function __construct(string $raw)
        {
            $this->raw = trim($raw);
        }

        public function __toString(): string
        {
            return $this->raw;
        }

        /**
         * @param string $phone
         * @param string $pattern
         *
         * @return bool
         */
        public static function isValid(string $phone, string $pattern = self::CZECH_REGEX): bool
        {
            return (bool) preg_match($pattern, $phone);
        }
    }