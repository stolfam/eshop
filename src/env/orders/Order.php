<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Orders;

    use Nette\Utils\DateTime;
    use Stolfam\Eshop\Env\Customers\Customer;
    use Stolfam\Eshop\Env\PaymentMethods\IPaymentMethod;
    use Stolfam\Eshop\Env\Products\ProductList;
    use Stolfam\Eshop\Env\ShippingMethods\IShippingMethod;
    use Stolfam\Eshop\Utils\Currency;
    use Stolfam\Eshop\Utils\Price;
    use Stolfam\Interfaces\IdentifiableByInteger;
    use Stolfam\Table\IntegerColumn;
    use Stolfam\Table\Row;
    use Stolfam\Table\StringColumn;
    use Stolfam\Traits\IdentifiedByInteger;


    /**
     * Class Order
     *
     * @package Stolfam\Eshop\Env\Orders
     * @property-read DateTime $dtUpdated;
     * @property-read Price    $price
     */
    class Order extends OrderDef implements IdentifiableByInteger
    {
        use IdentifiedByInteger;


        public History $history;

        /**
         * Order constructor.
         *
         * @param int             $id
         * @param Customer        $customer
         * @param ProductList     $products
         * @param History         $history
         * @param DateTime        $dtCreated
         * @param IShippingMethod $shippingMethod
         * @param IPaymentMethod  $paymentMethod
         */
        public function __construct(
            int $id,
            Customer $customer,
            ProductList $products,
            History $history,
            DateTime $dtCreated,
            IShippingMethod $shippingMethod,
            IPaymentMethod $paymentMethod
        ) {
            parent::__construct($customer, $products, $dtCreated, $shippingMethod, $paymentMethod);
            $this->id = $id;
            $this->history = $history;
        }

        public function toRow(): Row
        {
            $row = parent::toRow();
            $row->add(new IntegerColumn("status_id", $this->history->getLast()
                ->getId()));
            $row->add(new StringColumn("dt_created", $this->dtCreated->format(DATE_ISO8601)));

            return $row;
        }

        /**
         * @return DateTime
         */
        public function getDtUpdated(): DateTime
        {
            return $this->history->getLast()
                ->getDate();
        }

        /**
         * @return Price
         */
        public function getPrice(): Price
        {
            $price = new Price(0, Currency::getDefaultCurrency());

            foreach ($this->products as $product) {
                $price->plus($product->price);
            }

            return $price;
        }
    }