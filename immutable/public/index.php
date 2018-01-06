<?php

require '../vendor/autoload.php';

use Styde\User;
use Styde\Food;
use Styde\LunchBox;

$gordon = new User(['name' => 'Gordon']);

// Daughters
$joanie = new User(['name' => 'Joanie']);

$lunchbox = new LunchBox([
	new Food(['name' => 'Sandwich', 'beverage' => false]),
	new Food(['name' => 'Papas']),
	new Food(['name' => 'Jugo de naranja', 'beverage' => true]),
	new Food(['name' => 'Manzana']),
	new Food(['name' => 'Agua', 'beverage' => true]),
]);

// House
$joanie->setLunch(clone($lunchbox));

// School
$joanie->eatMeal();