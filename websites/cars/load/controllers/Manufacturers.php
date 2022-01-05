<?php
namespace load\controllers;
class Manufacturers {
    private $manufacturerconnect;

    public function __construct($manufacturerconnect) {
    $this-> manufacturerconnect = $manufacturerconnect;
    }
}
?>