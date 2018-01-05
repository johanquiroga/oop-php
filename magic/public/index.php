<?php

use Styde\HtmlNode;

require '../vendor/autoload.php';

$textarea = HtmlNode::textarea('Johan', ['name' => 'contenido'])
	->name('content')
	->id('contenido');

$input = HtmlNode::input()
	->name('content')
	->id('input_contenido');

echo $textarea->render();
echo $input->render();