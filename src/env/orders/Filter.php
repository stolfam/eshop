<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Orders;

    use Nette\Utils\DateTime;

    /**
     * Class Filter
     *
     * @package Stolfam\Eshop\Env\Orders
     */
    class Filter
    {
        const CUSTOMER_IDS = "customer_id";
        const DATE_START = "date_start";
        const DATE_END = "date_end";
        const STATUS_IDS = "status_id";

        /** @var int[]|null */
        public ?array $customerIds;

        /** @var int[]|null */
        public ?array $statusIds;

        /** @var DateTime|null */
        public ?DateTime $dateStart;

        /** @var DateTime|null */
        public ?DateTime $dateEnd;

        public function __construct(array $params)
        {
            if (isset($params[self::CUSTOMER_IDS]) && is_array($params[self::CUSTOMER_IDS])) {
                $this->customerIds = [];
                foreach ($params[self::CUSTOMER_IDS] as $customerId) {
                    $this->customerIds[] = (int)$customerId;
                }
            }
            if (isset($params[self::STATUS_IDS]) && is_array($params[self::STATUS_IDS])) {
                $this->statusIds = [];
                foreach ($params[self::STATUS_IDS] as $statusId) {
                    $this->statusIds[] = (int)$statusId;
                }
            }
            if (isset($params[self::DATE_START]) && $params[self::DATE_START] instanceof DateTime) {
                $this->dateStart = $params[self::DATE_START];
            }
            if (isset($params[self::DATE_END]) && $params[self::DATE_END] instanceof DateTime) {
                $this->dateEnd = $params[self::DATE_END];
            }
        }
    }