<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $tagDef = new \Stolfam\Eshop\Env\Tags\TagDef("Test Tag");

    Assert::same("test-tag", $tagDef->name);
    Assert::same("Test Tag", $tagDef->title);

    $tagsRepository = new class implements \Stolfam\Eshop\Repositories\Interfaces\ITagsRepository {

        /** @var \Stolfam\Eshop\Env\Tags\TagList */
        private $tags;

        public function __construct()
        {
            $this->tags = new \Stolfam\Eshop\Env\Tags\TagList();
        }

        public function createTag(\Stolfam\Eshop\Env\Tags\TagDef $tagDef): \Stolfam\Eshop\Env\Tags\Tag
        {
            $tag = new \Stolfam\Eshop\Env\Tags\Tag($this->tags->count() + 1, $tagDef->title, $tagDef->name);
            $this->tags->add($tag);

            return $tag;
        }

        public function getTag(\Ataccama\Common\Env\IEntry $tag): \Stolfam\Eshop\Env\Tags\Tag
        {
            $t = $this->tags->get($tag->id);
            if (isset($t)) {
                return $t;
            }
            throw new \Ataccama\Common\Exceptions\NotDefined("Tag with ID #$tag->id does not exist.");
        }

        public function getTagByName(string $name): \Stolfam\Eshop\Env\Tags\Tag
        {
            foreach ($this->tags as $tag) {
                if ($tag->name == $name) {
                    return $tag;
                }
            }

            return $this->createTag(new \Stolfam\Eshop\Env\Tags\TagDef($name));
        }

        public function deleteTag(\Ataccama\Common\Env\IEntry $tag): bool
        {
            return $this->tags->remove($tag->id);
        }

        public function listTags(): \Stolfam\Eshop\Env\Tags\TagList
        {
            return $this->tags;
        }
    };

    $tag = $tagsRepository->createTag($tagDef);

    Assert::same("test-tag", $tag->name);

    Assert::same(1, $tag->id);

    Assert::count(1, $tagsRepository->listTags());

    Assert::same(1, $tagsRepository->getTagByName("test-tag")->id);

    Assert::same(2, $tagsRepository->getTagByName("test-tag-2")->id);

    Assert::exception(function () use ($tagsRepository) {
        $tagsRepository->getTag(new \Ataccama\Common\Env\Entry(3));
    }, \Ataccama\Common\Exceptions\NotDefined::class);

    Assert::same("test-tag",$tag->toPairs()->get("name")->getValue());