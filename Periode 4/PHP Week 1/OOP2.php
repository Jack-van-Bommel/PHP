<?php

class Product {
    public $name = "Een bepaalde frisdrank.";
}


$frisdrank1 = new Product();
$frisdrank1->name = "Coca Cola";

$frisdrank2 = new Product();
$frisdrank2->name = "Fanta";

$frisdrank3 = new Product();
$frisdrank3->name = "Sprite";

$frisdrank4 = new Product();
$frisdrank4->name = "Dr Pepper";


var_dump($frisdrank1, $frisdrank2, $frisdrank3);
echo "<br>";
var_dump($frisdrank4);
echo "<br><br>";

echo $frisdrank1->name."<br>";
echo $frisdrank2->name."<br>";
echo $frisdrank3->name."<br>";
echo $frisdrank4->name."<br>";

$frisdrank4->name = "Cassis";
echo $frisdrank4->name."<br><br>";

var_dump($frisdrank4);

?>