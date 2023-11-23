<?php

trait BehaviorTrait
{
  public function performBehavior()
  {
    echo "{$this->name} is shows the general behavior of animals.\n";
  }

  public function move()
  {
    echo "{$this->name} is moving.\n";
  }

  public function greet()
  {
    echo "{$this->name} says hello!\n";
  }

  public function __invoke()
  {
    echo "{$this->name} is being called as a function.\n";
  }
}
