<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Orders;

    use Nette\Utils\DateTime;
    use Stolfam\Eshop\Env\Customers\Customer;
    use Stolfam\Eshop\Env\Products\ProductList;
    use Stolfam\Interfaces\IdentifiableByInteger;
    use Stolfam\Interfaces\IStorable;
    use Stolfam\Table\IntegerColumn;
    use Stolfam\Table\NullableIntegerColumn;
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
        public ?int $storeAddressId;

        /**
         * OrderDef constructor.
         *
         * @param Customer              $customer
         * @param ProductList           $products
         * @param DateTime              $dtCreated
         * @param IdentifiableByInteger $shippingMethod
         * @param IdentifiableByInteger $paymentMethod
         * @param int|null              $storeAddressId
         */
        public function __construct(
            Customer $customer,
            ProductList $products,
            DateTime $dtCreated,
            IdentifiableByInteger $shippingMethod,
            IdentifiableByInteger $paymentMethod,
            ?int $storeAddressId = null
        ) {
            $this->products = $products;
            $this->dtCreated = $dtCreated;
            $this->customer = $customer;
            $this->shippingMethod = $shippingMethod;
            $this->paymentMethod = $paymentMethod;
            $this->storeAddressId = $storeAddressId;
        }

        public function toRow(): Row
        {
            return new Row([
                new IntegerColumn('customer_id', $this->customer->id),
                new StringColumn('dt_created', $this->dtCreated->format("Y-m-d H:i:s")),
                new IntegerColumn("shipping_method_id", $this->shippingMethod->getId()),
                new IntegerColumn("payment_method_id", $this->paymentMethod->getId()),
                new IntegerColumn("shipping_address_id", $this->customer->shippingAddress->getId()),
                new IntegerColumn("billing_address_id", $this->customer->billingAddress->getId()),
                new NullableIntegerColumn("store_address_id", $this->storeAddressId)
            ]);
        }
    }