<?php

class Product {
    public $price;
    public $name;
    public $currency;


    public function __construct($price, $name, $currency = "&euro") {
        $this->price = $price;
        $this->name = ucfirst($name);
        $this->currency = $currency;
    }

    public function formatPrice(){
        return number_format($this->price, decimals: 2);
    }

    public function getProduct() {
        return "Het product: " . $this->name . " kost: " . $this->currency . $this->formatPrice();
    }

}


$muziek1 = new Product(price: 2, name: "techno beats", currency: "$");
echo $muziek1->getProduct() . "<br>";

$muziek2 = new Product(price: 5.555, name: "nu metal", currency: "$");
echo $muziek2->getProduct() . "<br>";

$muziek3 = new Product(price: 15.0123, name: "folklore", currency: "$");
echo $muziek3->getProduct();





?>