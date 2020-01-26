<?php

    namespace Stolfam\Eshop\Env\Tags;

    use Ataccama\Common\Env\Databaseable;
    use Nette\Utils\Strings;


    /**
     * Class TagDef
     * @package Stolfam\Eshop\Env\Tags
     */
    class TagDef implements Databaseable
    {
        /** @var string */
        public $title;

        /** @var string */
        public $name;

        /**
         * TagDef constructor.
         * @param string      $title
         * @param string|null $name
         */
        public function __construct(string $title, string $name = null)
        {
            $this->title = $title;
            if (!isset($this->name)) {
                $this->name = Strings::webalize($title);
            } else {
                $this->name = $name;
            }

        }

        public function row(): array
        {
            return [
                'title' => $this->title,
                'name'  => Strings::webalize($this->name)
            ];
        }
    }