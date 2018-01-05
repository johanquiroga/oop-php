<?php

require '../vendor/autoload.php';

use Styde\User;
use Styde\LunchBox;

$gordon = new User(['name' => 'Gordon']);

// Daughters
$joanie = new User(['name' => 'Joanie']);

$haley = new User(['name' => 'Haley']);

// House
$lunchbox = new LunchBox(['Sandwich']);

$joanie->setLunch(clone($lunchbox));

$haley->setLunch(clone($lunchbox));

// School
$joanie->eat();

$haley->eat();