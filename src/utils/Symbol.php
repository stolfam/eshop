<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Utils;

    use Nette\SmartObject;


    /**
     * Class Symbol
     * @package Stolfam\Eshop\Utils
     * @property-read string $before
     * @property-read string $after
     */
    class Symbol
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
                'after' => $this->after
            ];
        }
    }