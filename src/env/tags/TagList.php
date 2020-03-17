<?php

    namespace Stolfam\Eshop\Env\Tags;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class TagList
     * @package Stolfam\Eshop\Env\Tags
     */
    class TagList extends BaseArray
    {
        /**
         * @param Tag $tag
         * @return TagList
         */
        public function add($tag)
        {
            $this->items[$tag->id] = $tag;

            return $this;
        }

        /**
         * @return Tag
         */
        public function current(): Tag
        {
            return parent::current();
        }

        /**
         * @param $tagId
         * @return Tag|null
         */
        public function get($tagId): ?Tag
        {
            return parent::get($tagId);
        }
    }