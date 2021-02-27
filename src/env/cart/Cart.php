<?php
    declare(strict_types=1);

    namespace Stolfam\Eshop\Env\Cart;

    use Nette\SmartObject;
    use Nette\Utils\Random;
    use Stolfam\Eshop\Env\Attributes\AttributeList;
    use Stolfam\Eshop\Repositories\Interfaces\IProductsRepository;
    use Stolfam\Eshop\Utils\Currency;
    use Stolfam\Eshop\Utils\Price;
    use Stolfam\Interfaces\IdentifiableByString;


    /**
     * Class Cart
     *
     * @package Stolfam\Eshop\Env\Cart
     * @property-read Price  $price
     * @property-read string $id
     */
    class Cart implements IdentifiableByString
    {
        use SmartObject;


        protected string $id;

        private CartItemList $products;
        private ICartStorage $storage;
        private IProductsRepository $productsRepository;

        /**
         * Cart constructor.
         * @param ICartStorage        $storage
         * @param IProductsRepository $productsRepository
         */
        public function __construct(ICartStorage $storage, IProductsRepository $productsRepository)
        {
            $this->storage = $storage;
            $this->productsRepository = $productsRepository;
            $this->id = $this->getId();
            $this->load();
        }

        public function getId(): string
        {
            if (!empty($this->id)) {

                return $this->id;
            }
            if (isset($_COOKIE['_cid'])) {

                return $_COOKIE['_cid'];
            } else {
                $id = Random::generate(64);
                setcookie("_cid", $id);

                return $id;
            }
        }

        /**
         * @param int        $productId
         * @param int        $quantity
         * @param array|null $attributeValueIds
         * @return bool
         */
        public function addProduct(int $productId, int $quantity = 1, ?array $attributeValueIds = null): bool
        {
            $this->products->add(new CartItem($productId, $quantity, $attributeValueIds));

            return $this->save();
        }

        /**
         * @param int $cartItemId
         *
         * @return bool
         */
        public function removeProduct(int $cartItemId): bool
        {
            $cartItem = $this->products->remove($cartItemId);
            if (isset($cartItem)) {
                return $this->save();
            }

            return false;
        }

        private function save(): bool
        {
            return $this->storage->save($this->id, $this->products);
        }

        /**
         * @return CartItemList
         */
        public function listProducts(): CartItemList
        {
            return $this->products;
        }

        private function load(): bool
        {
            $cartItemList = $this->storage->load($this->id);
            if (isset($cartItemList)) {
                $this->products = $cartItemList;

                return true;
            }

            return false;
        }

        public function clear(): void
        {
            $this->products->clear();

            $this->save();
        }

        /**
         * @param int $cartItemId
         * @param int $quantity
         *
         * @return bool
         */
        public function update(int $cartItemId, int $quantity): bool
        {
            if ($this->products->get($cartItemId)) {
                $this->products->get($cartItemId)->quantity = $quantity;

                return $this->save();
            }

            return false;
        }

        /**
         * @return RenderableCartItemList
         */
        public function listPrintableProducts(): RenderableCartItemList
        {
            $list = new RenderableCartItemList();
            foreach ($this->listProducts() as $cartItem) {
                $product = $this->productsRepository->getProduct($cartItem->productId);
                $attributes = new AttributeList();
                if (!empty($cartItem->attributeValueIds)) {
                    foreach ($cartItem->attributeValueIds as $attributeValueId) {
                        $attribute = $product->attributes->findAttributeOfValue($attributeValueId);
                        if ($attribute != null) {
                            $attributes->add($attribute);
                        }
                    }
                }
                $list->add(new RenderableCartItem($product, $cartItem->quantity, $attributes));
            }

            return $list;
        }

        /**
         * @return Price
         */
        public function getPrice(): Price
        {
            $price = new Price(0, Currency::getDefaultCurrency());
            foreach ($this->products as $cartItem) {
                $product = $this->productsRepository->getProduct($cartItem->productId);
                $product->price->times($cartItem->quantity);
                $price->plus($product->price);;
            }

            return $price;
        }
    }