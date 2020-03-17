<?php

    namespace Stolfam\Eshop\Env\Orders;

    use Ataccama\Common\Env\Arrays\StringPair;
    use Ataccama\Common\Env\Arrays\StringPairArray;
    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Env\Storable;
    use Nette\Utils\DateTime;
    use Stolfam\Eshop\Env\Products\ProductList;


    /**
     * Class OrderDef
     * @package Stolfam\Eshop\Env\Orders
     */
    class OrderDef implements Storable
    {
        public ProductList $products;
        public DateTime $dtCreated;
        public IEntry $customer;
        public History $history;

        /**
         * OrderDef constructor.
         * @param IEntry      $customer
         * @param ProductList $products
         * @param History     $history
         * @param DateTime    $dtCreated
         */
        public function __construct(IEntry $customer, ProductList $products, History $history, DateTime $dtCreated)
        {
            $this->products = $products;
            $this->dtCreated = $dtCreated;
            $this->customer = $customer;
            $this->history = $history;
        }

        public function toPairs(): StringPairArray
        {
            return new StringPairArray([
                new StringPair('order_id', $this->id),
                new StringPair('customer_id', $this->customer->id),
                new StringPair('dt_created', $this->dtCreated->format(DATE_ISO8601)),
                new StringPair('status_id', $this->history->getLast()->id)
            ]);
        }
    }