<?php

require_once '/2-workstation/3-kuliah/semester-5/pemrograman-web/demo/modul4/tugas2/Traits/BehaviorTrait.php';

class Animal
{
  use BehaviorTrait;

  protected $name;
  protected $age;

  public function __construct($name, $age)
  {
    $this->name = $name;
    $this->age = $age;
  }

  public function eat()
  {
    echo "{$this->name} is eating.\n";
  }

  public function makeSound()
  {
    echo "{$this->name} makes a generic animal sound.\n";
  }
}
