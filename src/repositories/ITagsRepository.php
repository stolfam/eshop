<?php

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Ataccama\Common\Env\IEntry;
    use Stolfam\Eshop\Env\Tags\Tag;
    use Stolfam\Eshop\Env\Tags\TagDef;
    use Stolfam\Eshop\Env\Tags\TagList;


    /**
     * Interface ITagsRepository
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface ITagsRepository
    {
        /**
         * @param TagDef $tagDef
         * @return Tag
         */
        public function createTag(TagDef $tagDef): Tag;

        /**
         * @param IEntry $tag
         * @return Tag
         */
        public function getTag(IEntry $tag): Tag;

        /**
         * @param string $name
         * @return Tag
         */
        public function getTagByName(string $name): Tag;

        /**
         * @param IEntry $tag
         * @return bool
         */
        public function deleteTag(IEntry $tag): bool;

        /**
         * @return TagList
         */
        public function listTags(): TagList;
    }