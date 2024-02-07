<?php

class Product {
    public $name;
    public $price;
    public $category;

    public function formatPrice(){
        return number_format($this->price, decimals: 2);
    }

    public function setName($name){
        $this->name = ucfirst($name);
    }

    public function setCategory($category){
        $this->category = strtoupper($category);
    }

}

$fruit1 = new Product();
$fruit1->setName(name: "banaan");
$fruit1->price = 1.45;
$fruit1->setCategory(category: "geel");

foreach ($fruit1 as $data) {
    echo $data;
    echo "<br>";
}



?>