<?php

class Auto {

    public $brand;
    public $color;
    public $doors;

    function __construct($brand, $color, $doors)
    {
      $this->brand = $brand;
      $this->color = $color;
      $this->doors = $doors;
    }

    public function accelerate()
    {
      return "This $this->color car accelerates";
    }

    public function honk()
    {
      return "it has a horn";
    }

    public function stop()
    {
    	return "finally, it stops";
    }
}