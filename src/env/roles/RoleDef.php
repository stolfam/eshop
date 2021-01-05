<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Roles;


    use Stolfam\Interfaces\IdentifiableByInteger;
    use Stolfam\Interfaces\IStorable;
    use Stolfam\Table\NullableIntegerColumn;
    use Stolfam\Table\Row;
    use Stolfam\Table\StringColumn;

    /**
     * Class RoleDef
     *
     * @package Stolfam\Eshop\Env\Roles
     */
    class RoleDef implements IStorable
    {
        public string $name;
        public ?IdentifiableByInteger $parentRole;

        /**
         * RoleDef constructor.
         *
         * @param string                     $name
         * @param IdentifiableByInteger|null $parentRole
         */
        public function __construct(string $name, ?IdentifiableByInteger $parentRole = null)
        {
            $this->name = $name;
            $this->parentRole = $parentRole;
        }

        public function toRow(): Row
        {
            return new Row([
                new StringColumn("name", $this->name),
                new NullableIntegerColumn("parent_role_id", is_null($this->parentRole) ? null : $this->parentRole->id),
            ]);
        }
    }