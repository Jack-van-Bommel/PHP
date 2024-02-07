<?php

class Product {

    public function __construct(public $price, public $name, public $currency = "&euro") {
        $this->name = ucfirst($name);
    }

    public function formatPrice(){
        return number_format($this->price, decimals: 2);
    }


}


$cd1 = new Product(price: 14.50, name: "all killer no filler", currency: "$");

echo $cd1->name . "<br>";
echo $cd1->currency;
echo $cd1->price;


?>