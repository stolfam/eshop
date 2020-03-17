<?php

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Ataccama\Common\Env\IEntry;
    use Stolfam\Eshop\Env\Roles\Role;
    use Stolfam\Eshop\Env\Roles\RoleDef;
    use Stolfam\Eshop\Env\Roles\RoleList;


    /**
     * Interface IRolesRepository
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface IRolesRepository
    {
        /**
         * @param IEntry $role
         * @return Role
         */
        public function getRole(IEntry $role): Role;

        /**
         * @param RoleDef $roleDef
         * @return Role
         */
        public function createRole(RoleDef $roleDef): Role;

        /**
         * @param IEntry $user
         * @return RoleList
         */
        public function listRolesByUser(IEntry $user): RoleList;

        /**
         * @param IEntry $role
         * @return bool
         */
        public function deleteRole(IEntry $role): bool;
    }