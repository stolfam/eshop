<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Tags;

    use Stolfam\Arrays\BaseArray;

    /**
     * Class TagList
     *
     * @package Stolfam\Eshop\Env\Tags
     */
    class TagList extends BaseArray
    {
        /**
         * @param Tag $tag
         *
         * @return TagList
         */
        public function add($tag)
        {
            $this->items[$tag->id] = $tag;

            return $this;
        }

        /**
         * @return Tag|null
         */
        public function current(): ?Tag
        {
            return parent::current();
        }

        /**
         * @param int $tagId
         *
         * @return Tag|null
         */
        public function get($tagId): ?Tag
        {
            return parent::get($tagId);
        }
    }