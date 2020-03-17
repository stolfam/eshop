<?php

    namespace Stolfam\Eshop\Env\Deals;

    use Ataccama\Common\Env\IApiArray;
    use Nette\SmartObject;


    /**
     * Class Symbol
     * @package Stolfam\Env\Deals
     * @property-read string $before
     * @property-read string $after
     */
    class Symbol implements IApiArray
    {
        use SmartObject;

        protected string $before, $after;

        /**
         * Symbol constructor.
         * @param string $before
         * @param string $after
         */
        public function __construct(string $before, string $after)
        {
            $this->before = $before;
            $this->after = $after;
        }

        /**
         * @return string
         */
        public function getBefore(): string
        {
            return $this->before;
        }

        /**
         * @return string
         */
        public function getAfter(): string
        {
            return $this->after;
        }

        public function toApiArray(): array
        {
            return [
                'before' => $this->before,
                'after'  => $this->after
            ];
        }
    }