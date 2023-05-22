<?php

class Product {
    public $name;
    public $price;
    public $category;

    
    public function formatPrice(){
        return number_format($this->price, decimals: 2);
    }


    public function __construct($name, $price) {
        $this->name = ucfirst($name);

        $this->price = $price;
    }


    public function setCategory($category){
        $this->category = strtoupper($category);
    }

}


$fruit1 = new Product(name: "banaan", price: 1.5);
$fruit1->setCategory(category: "geel");

$fruit2 = new Product(name: "appel", price: 2);
$fruit2->setCategory(category: "rood");


foreach ($fruit1 as $data) {
    echo $data;
    echo "<br>";
}

foreach ($fruit2 as $data) {
    echo $data;
    echo "<br>";
}



?>