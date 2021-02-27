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
        public IdentifiableByInteger $shippingMethod;
        public IdentifiableByInteger $paymentMethod;

        /**
         * OrderDef constructor.
         *
         * @param IdentifiableByInteger $customer
         * @param ProductList           $products
         * @param DateTime              $dtCreated
         * @param IdentifiableByInteger $shippingMethod
         * @param IdentifiableByInteger $paymentMethod
         */
        public function __construct(
            IdentifiableByInteger $customer,
            ProductList $products,
            DateTime $dtCreated,
            IdentifiableByInteger $shippingMethod,
            IdentifiableByInteger $paymentMethod
        ) {
            $this->products = $products;
            $this->dtCreated = $dtCreated;
            $this->customer = $customer;
            $this->shippingMethod = $shippingMethod;
            $this->paymentMethod = $paymentMethod;
        }

        public function toRow(): Row
        {
            return new Row([
                new IntegerColumn('customer_id', $this->customer->id),
                new StringColumn('dt_created', $this->dtCreated->format("Y-m-d H:i:s")),
                new IntegerColumn("shipping_method_id", $this->shippingMethod->getId()),
                new IntegerColumn("payment_method_id", $this->paymentMethod->getId())
            ]);
        }
    }