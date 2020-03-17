<?php

    namespace Stolfam\Eshop\Env\Cart;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IEntry;
    use Nette\Utils\Random;
    use Stolfam\Eshop\Repositories\Interfaces\IProductsRepository;


    /**
     * Class Cart
     * @package Stolfam\Eshop\Env\Cart
     */
    class Cart implements IEntry
    {
        use BaseEntry;

        private CartItemList $products;
        private ICartStorage $storage;

        /**
         * Cart constructor.
         * @param ICartStorage $storage
         */
        public function __construct(ICartStorage $storage)
        {
            $this->storage = $storage;
            $this->id = $this->getId();
            $this->load();
        }

        public function getId()
        {
            if (isset($this->id)) {
                return $this->id;
            }
            if (isset($_COOKIE['cartId'])) {
                return $_COOKIE['cartId'];
            } else {
                return Random::generate(64);
            }
        }

        /**
         * @param IEntry $product
         * @param int    $quantity
         * @return bool
         */
        public function addProduct(IEntry $product, int $quantity = 1): bool
        {
            $this->products->add(new CartItem($product, $quantity));

            return $this->save();
        }

        /**
         * @param int $cartItemId
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

        public function update(int $cartItemId, int $quantity)
        {
            if ($this->products->get($cartItemId)) {
                $this->products->get($cartItemId)->quantity = $quantity;

                return $this->save();
            }

            return false;
        }

        /**
         * @param IProductsRepository $productsRepository
         * @return PrintableCartItemList
         */
        public function listPrintableProducts(IProductsRepository $productsRepository): PrintableCartItemList
        {
            $list = new PrintableCartItemList();
            foreach ($this->listProducts() as $cartItem) {
                $list->add(new PrintableCartItem($productsRepository->getProduct($cartItem->product),
                    $cartItem->quantity));
            }

            return $list;
        }
    }