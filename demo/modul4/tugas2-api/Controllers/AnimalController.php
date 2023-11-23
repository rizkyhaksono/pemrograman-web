<?php

namespace Controller;

include "Controller.php";
include "/2-workstation/3-kuliah/semester-5/pemrograman-web/demo/modul4/tugas2-api/Models/Animals.php";
include "/2-workstation/3-kuliah/semester-5/pemrograman-web/demo/modul4/tugas2-api/Traits/ResponsiveFormatter.php";

use Models\Animals;
use Traits\ResponseFormatter;

class AnimalController extends Controller
{
  use ResponseFormatter;

  public function __construct()
  {
    $this->ControllerName = "AnimalController";
  }

  public function getAllAnimal()
  {
    $ani = new Animals;
    $animals = $ani->animalList();
    $response = [
      "controller_attribute" => $this->getControllerAttribute("GetAllAnimal", "GET"),
      "data" => $animals
    ];

    return $this->responseFormatter(200, "Success", $response);
  }

  public function getAnimalById($index)
  {
    $ani = new Animals;
    $animals = $ani->animalList();
    $response = [
      "controller_attribute" => $this->getControllerAttribute("GetAnimalsById", "GET"),
      "data" => null
    ];
    if ($index < count($animals)) {
      $response["data"] = $animals[$index];
      return $this->responseFormatter(200, "Success", $response);
    } else {
      return $this->responseFormatter(400, "Bad Request", $response);
    }
  }
}
