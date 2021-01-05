<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Repositories\Interfaces;

    use Stolfam\Eshop\Env\Roles\Role;
    use Stolfam\Eshop\Env\Roles\RoleDef;
    use Stolfam\Eshop\Env\Roles\RoleList;


    /**
     * Interface IRolesRepository
     *
     * @package Stolfam\Eshop\Repositories\Interfaces
     */
    interface IRolesRepository
    {
        /**
         * @param int $roleId
         *
         * @return Role
         */
        public function getRole(int $roleId): Role;

        /**
         * @param RoleDef $roleDef
         *
         * @return Role
         */
        public function createRole(RoleDef $roleDef): Role;

        /**
         * @param int $userId
         *
         * @return RoleList
         */
        public function listRolesByUser(int $userId): RoleList;

        /**
         * @param int $roleId
         *
         * @return bool
         */
        public function deleteRole(int $roleId): bool;
    }