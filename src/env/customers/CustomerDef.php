<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Customers;

    use Stolfam\Env\Person\Email;
    use Stolfam\Env\Person\Name;
    use Stolfam\Eshop\Env\Consents\Consent;
    use Stolfam\Interfaces\IStorable;
    use Stolfam\Table\BoolColumn;
    use Stolfam\Table\IntegerColumn;
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
        public ?string $passwordHash;
        public array $consents = [];

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
        ) {
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->shippingAddress = $shippingAddress;
            $this->billingAddress = $billingAddress;
        }

        public function toRow(): Row
        {
            $row = new Row([
                new StringColumn('name', "$this->name"),
                new StringColumn('email', "$this->email"),
                new NullableStringColumn('phone', "$this->phone"),
                new StringColumn("dt_created", date("Y-m-d H:i:s")),
                new NullableStringColumn("password_hash", $this->passwordHash)

            ]);
            foreach ($this->consents as $name => $given) {
                $row->add(new BoolColumn($name, $given));
            }
            if (isset($this->shippingAddress)) {
                $row->add(new IntegerColumn("default_shipping_address_id", $this->shippingAddress->id));
            }
            if (isset($this->billingAddress)) {
                $row->add(new IntegerColumn("default_billing_address_id", $this->billingAddress->id));
            }

            return $row;
        }

        /**
         * @param Consent $consent
         */
        public function addConsent(Consent $consent): void
        {
            $this->consents[$consent->name] = $consent->given;
        }

        /**
         * @param string $name
         * @return bool
         */
        public function getConsent(string $name): bool
        {
            if (isset($this->consents[$name])) {
                return $this->consents[$name];
            }

            return false;
        }
    }