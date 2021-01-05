<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Roles;

    use Stolfam\Interfaces\IdentifiableByInteger;
    use Stolfam\Traits\IdentifiedByInteger;

    /**
     * Class Role
     *
     * @package Stolfam\Eshop\Env\Roles
     */
    class Role extends RoleDef implements IdentifiableByInteger
    {
        use IdentifiedByInteger;

        /**
         * Role constructor.
         *
         * @param int                        $id
         * @param string                     $name
         * @param IdentifiableByInteger|null $parentRole
         */
        public function __construct(int $id, string $name, ?IdentifiableByInteger $parentRole = null)
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