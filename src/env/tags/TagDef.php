<?php

    namespace Stolfam\Eshop\Env\Tags;

    use Ataccama\Common\Env\Arrays\StringPair;
    use Ataccama\Common\Env\Arrays\StringPairArray;
    use Ataccama\Common\Env\Storable;
    use Nette\Utils\Strings;


    /**
     * Class TagDef
     * @package Stolfam\Eshop\Env\Tags
     */
    class TagDef implements Storable
    {
        public string $title;
        public string $name;

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

        public function toPairs(): StringPairArray
        {
            return new StringPairArray([
                new StringPair("title", $this->title),
                new StringPair("name", Strings::webalize($this->name))
            ]);
        }
    }