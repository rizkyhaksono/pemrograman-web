<?php

namespace Models;

class Animals
{
  public function animalList()
  {
    $animals = [
      ["name" => "Monkey", "age" => 10],
      ["name" => "Crocodile", "age" => 3],
      ["name" => "Snake", "age" => 8],
      ["name" => "Dog", "age" => 5],
      ["name" => "Chicken", "age" => 2],
      ["name" => "Ant", "age" => 1],
      ["name" => "Sheep", "age" => 2],
    ];

    return $animals;
  }
}
