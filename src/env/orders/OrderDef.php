<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Orders;

    use Nette\Utils\DateTime;
    use Stolfam\Eshop\Env\Products\ProductList;
    use Stolfam\Interfaces\IdentifiableByInteger;
    use Stolfam\Interfaces\IStorable;
    use Stolfam\Table\IntegerColumn;
    use Stolfam\Table\Row;
    use Stolfam\Table\StringColumn;


    /**
     * Class OrderDef
     *
     * @package Stolfam\Eshop\Env\Orders
     */
    class OrderDef implements IStorable
    {
        public ProductList $products;
        public DateTime $dtCreated;
        public IdentifiableByInteger $customer;

        /**
         * OrderDef constructor.
         *
         * @param IdentifiableByInteger $customer
         * @param ProductList           $products
         * @param DateTime              $dtCreated
         */
        public function __construct(IdentifiableByInteger $customer, ProductList $products, DateTime $dtCreated)
        {
            $this->products = $products;
            $this->dtCreated = $dtCreated;
            $this->customer = $customer;
        }

        public function toRow(): Row
        {
            return new Row([
                new IntegerColumn('customer_id', $this->customer->id),
                new StringColumn('dt_created', $this->dtCreated->format(DATE_ISO8601))
            ]);
        }
    }