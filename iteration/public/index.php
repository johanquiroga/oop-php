<?php

require '../vendor/autoload.php';

use Styde\User;
use Styde\LunchBox;

$gordon = new User(['name' => 'Gordon']);

// Daughters
$joanie = new User(['name' => 'Joanie']);

$lunchbox = new LunchBox(['Sandwich', 'Papas', 'Jugo de naranja', 'Manzana']);

// House
$joanie->setLunch(clone($lunchbox));

// School
$joanie->eatMeal();