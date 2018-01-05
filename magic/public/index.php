<?php

require '../vendor/autoload.php';

use Styde\User;

$user = new User([
	'name' => 'Johan',
	'email' => 'johan.c.quiroga@gmail.com'
]);

$user->id = 10;

echo $result = serialize($user);

file_put_contents('../storage/user.txt', $result);