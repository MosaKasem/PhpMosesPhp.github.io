<?php

class RouteController {

    private $database;

    public function __construct() {
        $this->database = new Database();
    }

}