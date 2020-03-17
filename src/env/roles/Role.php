<?php

    namespace Stolfam\Eshop\Env\Roles;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IApiArray;
    use Ataccama\Common\Env\IEntry;


    /**
     * Class Role
     * @package Stolfam\Eshop\Env\Roles
     */
    class Role extends RoleDef implements IEntry, IApiArray
    {
        use BaseEntry;

        /**
         * Role constructor.
         * @param int         $id
         * @param string      $name
         * @param IEntry|null $parentRole
         */
        public function __construct(int $id, string $name, ?IEntry $parentRole = null)
        {
            parent::__construct($name, $parentRole);
            $this->id = $id;
        }

        public function toApiArray(): array
        {
            return [
                'id'           => $this->id,
                'name'         => $this->name,
                'parentRoleId' => isset($this->parentRole) ? $this->parentRole->id : null
            ];
        }
    }