<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Stolfam\Eshop\Env\Tags\Tag;
    use Stolfam\Eshop\Env\Tags\TagDef;
    use Stolfam\Eshop\Env\Tags\TagList;


    /**
     * Interface ITagsRepository
     *
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface ITagsRepository
    {
        /**
         * @param TagDef $tagDef
         *
         * @return Tag
         */
        public function createTag(TagDef $tagDef): Tag;

        /**
         * @param int $tagId
         *
         * @return Tag
         */
        public function getTag(int $tagId): Tag;

        /**
         * @param string $name
         *
         * @return Tag
         */
        public function getTagByName(string $name): Tag;

        /**
         * @param int $tagId
         *
         * @return bool
         */
        public function deleteTag(int $tagId): bool;

        /**
         * @return TagList
         */
        public function listTags(): TagList;
    }