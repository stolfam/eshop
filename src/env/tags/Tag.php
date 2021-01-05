<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Tags;


    use Stolfam\Interfaces\IdentifiableByInteger;
    use Stolfam\Traits\IdentifiedByInteger;

    /**
     * Class Tag
     *
     * @package Stolfam\Eshop\Env\Tags
     */
    class Tag extends TagDef implements IdentifiableByInteger
    {
        use IdentifiedByInteger;

        /**
         * Tag constructor.
         *
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