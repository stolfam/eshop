<?php

    namespace Stolfam\Eshop\Env\Tags;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IEntry;


    /**
     * Class Tag
     * @package Stolfam\Eshop\Env\Tags
     */
    class Tag extends TagDef implements IEntry
    {
        use BaseEntry;

        /**
         * Tag constructor.
         * @param int         $id
         * @param string      $title
         * @param string|null $name
         */
        public function __construct(int $id, string $title, string $name = null)
        {
            parent::__construct($title, $name);
            $this->id = $id;
        }
    }