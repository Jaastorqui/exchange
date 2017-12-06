<?php

namespace App\Classes;
class Travels  {
    public $day;
    public $cityDeparture;
    public $cityArrived;
    public $price;
    public $name;
    public $brand;
    public $model;
    
    public function __construct($day = null, $cityDeparture = null, $cityArrived = null, $price = null, $name = null, $brand = null, $model = null)
    {   
        $this->day = $day;
        $this->cityDeparture = $cityDeparture;
        $this->cityArrived = $cityArrived;
        $this->price = $price;
        $this->name = $name;
        $this->brand = $brand;
        $this->model = $model;
    }

    public function getTravel () 
    {
        return $this;
    }
}