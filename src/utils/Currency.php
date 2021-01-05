<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Utils;

    use Stolfam\Env\Pair;
    use Stolfam\Interfaces\IdentifiableByInteger;
    use Stolfam\Interfaces\Pairable;
    use Stolfam\Traits\IdentifiedByInteger;


    /**
     * Class Currency
     *
     * @package Stolfam\Eshop\Utils
     * @property-read int    $id
     * @property-read float  $ratio
     * @property-read Symbol $symbol
     * @property-read string $name
     */
    class Currency implements IdentifiableByInteger, Pairable
    {
        use IdentifiedByInteger;

        const CZK = 1;
        const USD = 2;
        const EUR = 3;

        public static float $RATIO_CZK = 1;
        public static float $RATIO_USD = 0.044;
        public static float $RATIO_EUR = 0.04;

        private static Currency $defaultCurrency;

        protected int $id;
        protected string $name;
        protected float $ratio;
        protected Symbol $symbol;

        /**
         * Currency constructor.
         *
         * @param int    $id
         * @param string $name
         * @param float  $ratio
         * @param Symbol $symbol
         */
        public function __construct(int $id, string $name, float $ratio, Symbol $symbol)
        {
            $this->id = $id;
            $this->name = $name;
            $this->ratio = $ratio;
            $this->symbol = $symbol;
        }

        /**
         * @return float
         */
        public function getRatio(): float
        {
            return $this->ratio;
        }

        /**
         * @return Symbol
         */
        public function getSymbol(): Symbol
        {
            return $this->symbol;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @return Currency
         */
        public static function czk(): Currency
        {
            return new Currency(self::CZK, "CZK", self::$RATIO_CZK, new Symbol("", " Kč"));
        }

        public static function usd(): Currency
        {
            return new Currency(self::USD, "USD", self::$RATIO_USD, new Symbol("$", ""));
        }

        public static function eur(): Currency
        {
            return new Currency(self::EUR, "EUR", self::$RATIO_EUR, new Symbol("€", ""));
        }

        /**
         * @param int $currencyId
         *
         * @return Currency
         */
        public static function make(int $currencyId): Currency
        {
            switch ($currencyId) {
                case self::USD:
                    return self::usd();
                case self::EUR:
                    return self::eur();
                default:
                    return self::czk();
            }
        }

        /**
         * @return Currency[]
         */
        public static function list(): array
        {
            return [
                self::czk(),
                self::eur(),
                self::usd()
            ];
        }

        public function toPair(): Pair
        {
            return new Pair($this->id, $this->name);
        }

        public function toApiArray(): array
        {
            return [
                'id'     => $this->id,
                'name'   => $this->name,
                'ratio'  => $this->ratio,
                'symbol' => $this->symbol->toApiArray()
            ];
        }

        /**
         * @return Currency
         */
        public static function getDefaultCurrency(): Currency
        {
            if (!isset(self::$defaultCurrency)) {
                return self::czk();
            }

            return self::$defaultCurrency;
        }

        /**
         * @param Currency $defaultCurrency
         */
        public static function setDefaultCurrency(Currency $defaultCurrency): void
        {
            self::$defaultCurrency = $defaultCurrency;
        }
    }