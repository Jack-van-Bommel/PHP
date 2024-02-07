<?php

class Music {
    public $name;
    public $genre;
    public $listen;


    public function __construct(string $name, string $genre, int $listen) {
        $this->name = $name;
        $this->genre = $genre;
        $this->listen = $listen;
    }

    public function getName(){
        return $this->name;
    }

}



?>