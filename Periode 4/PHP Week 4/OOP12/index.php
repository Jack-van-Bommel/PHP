<?php
declare(strict_types=1);


require_once "OOP12.php";
require_once "ListenList.php";


$kees = new ListenList();

$music1 = new Music(name: "Bach", genre: "Klassiek", listen: 3);
$music2 = new Music(name: "ABC", genre: "House", listen: 2);


$kees->addMusic($music1);
$kees->addMusic($music2);

echo $music1->getName() . "<br><br>";
var_dump($kees);

?>