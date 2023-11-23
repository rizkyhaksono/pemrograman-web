<?php

include "Controllers/AnimalController.php";

use Controller\AnimalController;

$AniController = new AnimalController;

// echo $AniController->getAllAnimal();
echo $AniController->getAnimalById(2);
