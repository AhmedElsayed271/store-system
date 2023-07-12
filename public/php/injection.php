<?php

class product
{
    public $productName;
    public $productPrice;
    public $productQuantity;

    public function __construct($productName, $productPrice, $productQuantity)
    {
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->productQuantity = $productQuantity;
    }

    public function calculateTax()
    {
    }
}

class orders
{
    public $orderId;
    public $product;

    public function __construct($orderId)
    {

        $this->orderId = $orderId;
    }

    public function setMethod(product $product)
    {
        $this->product = $product;
    }
}


$product = new product('apple', 10, 10);

$order = new orders(123);
$order->setMethod($product);
echo "<pre>";
var_dump($order);
echo "</pre>";
