<?php
class CarsController {
    private $carsconnect;

    public function __construct($carsconnect) {
    $this-> carsconnect = $carsconnect;
    }

    public function showroomlist() {
        $cars = $this->$carsconnect->findall();
        return []
    }

}


?>