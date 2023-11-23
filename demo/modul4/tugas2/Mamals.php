<?php

require_once "/2-workstation/3-kuliah/semester-5/pemrograman-web/demo/modul4/tugas2/Animal.php";

class Mammal extends Animal
{
  public function giveBirth()
  {
    echo "{$this->name} is giving birth to live young.\n";
  }

  public function makeSound()
  {
    echo "{$this->name} makes a mammalian sound.\n";
  }
}
