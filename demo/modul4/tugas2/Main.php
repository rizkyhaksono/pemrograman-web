<?php

require_once "/2-workstation/3-kuliah/semester-5/pemrograman-web/demo/modul4/tugas2/Mamals.php";
require_once "/2-workstation/3-kuliah/semester-5/pemrograman-web/demo/modul4/tugas2/Reptiles.php";

class Main
{
  public function __invoke()
  {
    $lion = new Mammal("Monkey", 8);
    $lion->eat();
    $lion->giveBirth();
    $lion->makeSound();

    echo "\n";

    $snake = new Reptile("Snake", 10);
    $snake->eat();
    $snake->layEggs();
    $snake->makeSound();

    echo "\n";
  }
}

// Usage
$main = new Main();
$main();
