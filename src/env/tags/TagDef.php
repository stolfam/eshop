<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Tags;

    use Nette\Utils\Strings;
    use Stolfam\Interfaces\IStorable;
    use Stolfam\Table\Row;
    use Stolfam\Table\StringColumn;


    /**
     * Class TagDef
     *
     * @package Stolfam\Eshop\Env\Tags
     */
    class TagDef implements IStorable
    {
        public string $title;
        public string $name;

        /**
         * TagDef constructor.
         *
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

        public function toRow(): Row
        {
            return new Row([
                new StringColumn("title", $this->title),
                new StringColumn("name", Strings::webalize($this->name))
            ]);
        }
    }