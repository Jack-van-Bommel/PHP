<?php

class Product {
    public $name = "Een bepaalde frisdrank.";
    public $price;

    public function formatPrice(){
        return number_format($this->price, decimals: 2);
    }
}


$frisdrank1 = new Product();
$frisdrank1->name = "Coca Cola";
$frisdrank1->price = 4;

$frisdrank2 = new Product();
$frisdrank2->name = "Fanta";
$frisdrank2->price = 2;

$frisdrank3 = new Product();
$frisdrank3->name = "Sprite";
$frisdrank3->price = 1.5;

$frisdrank4 = new Product();
$frisdrank4->name = "Dr Pepper";
$frisdrank4->price = 3;


var_dump($frisdrank1, $frisdrank2, $frisdrank3, $frisdrank4);
echo "<br><br>";


echo $frisdrank1->name."<br>";
echo $frisdrank1->formatPrice()."<br><br>";

echo $frisdrank2->name."<br>";
echo $frisdrank2->formatPrice()."<br><br>";

echo $frisdrank3->name."<br>";
echo $frisdrank3->formatPrice()."<br><br>";

echo $frisdrank4->name."<br>";
echo $frisdrank4->formatPrice()."<br><br>";

$frisdrank4->name = "Cassis";
echo $frisdrank4->name."<br>";
echo $frisdrank4->formatPrice();


?>