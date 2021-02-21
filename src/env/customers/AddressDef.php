<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Customers;

    use Stolfam\Env\Person\Address;
    use Stolfam\Interfaces\IStorable;
    use Stolfam\Table\IntegerColumn;
    use Stolfam\Table\NullableStringColumn;
    use Stolfam\Table\Row;
    use Stolfam\Table\StringColumn;


    /**
     * Class AddressDef
     *
     * @package Stolfam\Eshop\Env\Customers
     */
    class AddressDef extends Address implements IStorable
    {
        public ?string $companyName;
        public int $customerId;

        /**
         * AddressDef constructor.
         *
         * @param int         $customerId
         * @param string      $street
         * @param string      $city
         * @param string      $postcode
         * @param string      $country
         * @param string|null $companyName
         * @param string|null $state
         * @param string|null $additionalDetail
         */
        public function __construct(
            int $customerId,
            string $street,
            string $city,
            string $postcode,
            string $country,
            ?string $companyName,
            ?string $state = null,
            ?string $additionalDetail = null
        ) {
            parent::__construct($street, $city, $postcode, $country, $state, $additionalDetail);
            $this->companyName = $companyName;
            $this->customerId = $customerId;
        }

        public function toRow(): Row
        {
            return new Row([
                new NullableStringColumn("company_name", $this->companyName),
                new StringColumn("street", $this->street),
                new StringColumn("city", $this->city),
                new StringColumn("postcode", $this->postcode),
                new StringColumn("country", $this->country),
                new NullableStringColumn("state", $this->state),
                new NullableStringColumn("additional_detail", $this->additionalDetail),
                new IntegerColumn("customer_id", $this->customerId),
            ]);
        }
    }