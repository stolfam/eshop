<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Customers;

    use Nette\Utils\DateTime;
    use Stolfam\Env\Person\Email;
    use Stolfam\Env\Person\Name;
    use Stolfam\Interfaces\IdentifiableByInteger;
    use Stolfam\Table\Row;
    use Stolfam\Table\StringColumn;
    use Stolfam\Traits\IdentifiedByInteger;


    /**
     * Class Customer
     *
     * @package Stolfam\Eshop\Env\Customers
     * @property-read DateTime $dtCreated
     */
    class Customer extends CustomerDef implements IdentifiableByInteger
    {
        use IdentifiedByInteger;


        protected DateTime $dtCreated;

        /**
         * Customer constructor.
         *
         * @param int          $id
         * @param DateTime     $dtCreated
         * @param Name         $name
         * @param Email        $email
         * @param Phone|null   $phone
         * @param Address|null $shippingAddress
         * @param Address|null $billingAddress
         */
        public function __construct(
            int $id,
            DateTime $dtCreated,
            Name $name,
            Email $email,
            ?Phone $phone = null,
            ?Address $shippingAddress = null,
            ?Address $billingAddress = null
        ) {
            parent::__construct($name, $email, $phone, $shippingAddress, $billingAddress);
            $this->id = $id;
            $this->dtCreated = $dtCreated;
        }

        /**
         * @return DateTime
         */
        public function getDtCreated(): DateTime
        {
            return $this->dtCreated;
        }

        public function toRow(): Row
        {
            $row = parent::toRow();
            $row->add(new StringColumn("dt_created", $this->dtCreated->format("Y-m-d H:i:s")));

            return $row;
        }
    }