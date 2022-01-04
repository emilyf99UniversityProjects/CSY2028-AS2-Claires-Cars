<?php
class CarsController {
    private $getDatabaseFunctions;

    public function __construct($getDatabaseFunctions) {
    $this-> getDatabaseFunctions = $getDatabaseFunctions;
    }

    public function showroomlist() {
        $cars = $this->$getDatabaseFunctions->findall();
        return []
    }

}


?>