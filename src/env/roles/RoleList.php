<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Roles;

    use Stolfam\Arrays\BaseArray;
    use Stolfam\Arrays\PairArray;
    use Stolfam\Env\Pair;

    /**
     * Class RoleList
     *
     * @package Stolfam\Eshop\Env\Roles
     */
    class RoleList extends BaseArray
    {
        /**
         * @param Role $role
         *
         * @return RoleList
         */
        public function add($role)
        {
            $this->items[$role->id] = $role;

            return $this;
        }

        /**
         * @return Role
         */
        public function current(): Role
        {
            return parent::current();
        }

        /**
         * @param $roleId
         *
         * @return Role
         */
        public function get($roleId): Role
        {
            return parent::get($roleId);
        }

        public function toPairs(): PairArray
        {
            $pairs = new PairArray();
            foreach ($this as $role) {
                $pairs->add(new Pair($role->getId(), $role->name));
            }

            return $pairs;
        }
    }