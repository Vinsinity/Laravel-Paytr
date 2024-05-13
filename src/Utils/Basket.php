<?php 

namespace Softliya\Paytr\Utils;

use Softliya\Paytr\Utils\Product;

class Basket
{
    /**
     * @var array
     */
    private $products = [];

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function addProduct(Product $product, int $quantity)
    {
        $this->products[] = [
            $product->getName(),
            $product->getPrice(),
            $quantity
        ];
        return $this;
    }

    /**
     * @param array $basketProducts
     * @var $basketProducts [0] string
     * @var $basketProducts [1] float
     * @var $basketProducts [2] int
     */
    public function addProducts(array $basketProducts)
    {
        $this->products = array_merge($this->products, $basketProducts);
        return $this;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function formatted(): string
    {
        return base64_encode(json_encode($this->products));
    }

    public function entity()
    {
        return htmlentities(json_encode($this->products));
    }
}