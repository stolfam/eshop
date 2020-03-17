<?php

    namespace Stolfam\Eshop\Env\Roles;

    use Ataccama\Common\Env\Arrays\StringPair;
    use Ataccama\Common\Env\Arrays\StringPairArray;
    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Env\Storable;


    /**
     * Class RoleDef
     * @package Stolfam\Eshop\Env\Roles
     */
    class RoleDef implements Storable
    {
        public string $name;
        public ?IEntry $parentRole;

        /**
         * RoleDef constructor.
         * @param string      $name
         * @param IEntry|null $parentRole
         */
        public function __construct(string $name, ?IEntry $parentRole = null)
        {
            $this->name = $name;
            $this->parentRole = $parentRole;
        }

        public function toPairs(): StringPairArray
        {
            return new StringPairArray([
                new StringPair("name", $this->name),
                new StringPair("parent_role_id", is_null($this->parentRole) ? null : $this->parentRole->id),
            ]);
        }
    }