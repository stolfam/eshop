<?php

    namespace Stolfam\Eshop\Utils;

    use Ataccama\Common\Env\IApiArray;


    /**
     * Class Price
     * @package Stolfam\Env\Deals
     */
    class Price implements IApiArray
    {
        public int $value;
        public Currency $currency;

        /**
         * Price constructor.
         * @param int      $value
         * @param Currency $currency
         */
        public function __construct(int $value, Currency $currency)
        {
            $this->value = $value;
            $this->currency = $currency;
        }

        /**
         * @param Price $price
         */
        public function plus(Price $price): void
        {
            $this->value += $price->value / ($price->currency->ratio / $this->currency->ratio);
        }

        /**
         * @param Price $price
         */
        public function minus(Price $price): void
        {
            $this->value -= $price->value / ($price->currency->ratio / $this->currency->ratio);
            if ($this->value < 0) {
                $this->value = 0;
            }
        }

        public function __toString()
        {
            return $this->currency->symbol->before . round($this->value) . $this->currency->symbol->after;
        }

        /**
         * @param Price $price
         * @return bool
         */
        public function equal(Price $price): bool
        {
            return $this->value == $price->value / ($price->currency->ratio / $this->currency->ratio);
        }

        public function greater(Price $price): bool
        {
            return $this->value > $price->value / ($price->currency->ratio / $this->currency->ratio);
        }

        public function smaller(Price $price): bool
        {
            return $this->value < $price->value / ($price->currency->ratio / $this->currency->ratio);
        }

        public function times(float $number): void
        {
            $this->value *= $number;
        }

        public function toApiArray(): array
        {
            return [
                'value'    => $this->value,
                'currency' => $this->currency->toApiArray()
            ];
        }
    }