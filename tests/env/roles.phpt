<?php
    require __DIR__ . "/../bootstrap.php";

    $rolesRepository = new class implements \Stolfam\Eshop\Repositories\Interfaces\IRolesRepository {
        private \Stolfam\Eshop\Env\Roles\RoleList $roles;

        /**
         *  constructor.
         */
        public function __construct()
        {
            $this->roles = new \Stolfam\Eshop\Env\Roles\RoleList();
        }

        public function getRole(\Ataccama\Common\Env\IEntry $role): \Stolfam\Eshop\Env\Roles\Role
        {
            return $this->roles->get($role->id);
        }

        public function createRole(\Stolfam\Eshop\Env\Roles\RoleDef $roleDef): \Stolfam\Eshop\Env\Roles\Role
        {
            $index = count($this->roles) + 1;
            $role = new \Stolfam\Eshop\Env\Roles\Role($index, $roleDef->name);;
            $this->roles->add($role);

            return $role;
        }

        public function listRolesByUser(\Ataccama\Common\Env\IEntry $user): \Stolfam\Eshop\Env\Roles\RoleList
        {
            return $this->roles;
        }

        public function deleteRole(\Ataccama\Common\Env\IEntry $role): bool
        {
            return $this->roles->remove($role->id);
        }
    };

    $role = $rolesRepository->createRole(new \Stolfam\Eshop\Env\Roles\RoleDef("guest"));

    \Tester\Assert::same("guest", $rolesRepository->getRole(new \Ataccama\Common\Env\Entry(1))->name);

    \Tester\Assert::same(1, $rolesRepository->getRole(new \Ataccama\Common\Env\Entry(1))->id);

    \Tester\Assert::same("guest", $rolesRepository->getRole(new \Ataccama\Common\Env\Entry(1))->toPairs()->tryToGetByKey('name')->getValue());