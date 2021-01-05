<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Customers;

    use Stolfam\Env\Person\Address;
    use Stolfam\Env\Person\Email;
    use Stolfam\Env\Person\Name;
    use Stolfam\Interfaces\IStorable;
    use Stolfam\Table\NullableStringColumn;
    use Stolfam\Table\Row;
    use Stolfam\Table\StringColumn;

    /**
     * Class CustomerDef
     *
     * @package Stolfam\Eshop\Env\Customers
     */
    class CustomerDef implements IStorable
    {
        public Name $name;
        public Email $email;
        public ?Phone $phone;
        public ?Address $shippingAddress;
        public ?Address $billingAddress;

        /**
         * CustomerDef constructor.
         *
         * @param Name         $name
         * @param Email        $email
         * @param Phone|null   $phone
         * @param Address|null $shippingAddress
         * @param Address|null $billingAddress
         */
        public function __construct(
            Name $name,
            Email $email,
            ?Phone $phone = null,
            ?Address $shippingAddress = null,
            ?Address $billingAddress = null
        )
        {
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->shippingAddress = $shippingAddress;
            $this->billingAddress = $billingAddress;
        }

        public function toRow(): Row
        {
            return new Row([
                new StringColumn('name', "$this->name"),
                new StringColumn('email', "$this->email"),
                new NullableStringColumn('phone', "$this->phone"),
                new StringColumn("dt_created", date(DATE_ISO8601))
            ]);
        }
    }