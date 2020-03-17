<?php

    namespace Stolfam\Eshop\Env\Orders;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IEntry;
    use Nette\Utils\DateTime;
    use Stolfam\Eshop\Env\Customers\Customer;
    use Stolfam\Eshop\Env\Products\ProductList;


    /**
     * Class Order
     * @package Stolfam\Eshop\Env\Orders
     */
    class Order extends OrderDef implements IEntry
    {
        use BaseEntry;

        /**
         * Order constructor.
         * @param int         $id
         * @param Customer    $customer
         * @param ProductList $products
         * @param History     $history
         * @param DateTime    $dtCreated
         */
        public function __construct(
            int $id,
            Customer $customer,
            ProductList $products,
            History $history,
            DateTime $dtCreated
        ) {
            parent::__construct($customer, $products, $history, $dtCreated);
            $this->id = $id;
        }
    }