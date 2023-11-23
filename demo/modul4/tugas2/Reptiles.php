<?php

require_once "/2-workstation/3-kuliah/semester-5/pemrograman-web/demo/modul4/tugas2/Animal.php";

class Reptile extends Animal
{
  public function layEggs()
  {
    echo "{$this->name} is laying eggs.\n";
  }

  public function makeSound()
  {
    echo "{$this->name} makes a reptilian sound.\n";
  }
}
