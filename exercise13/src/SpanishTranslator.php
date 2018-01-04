<?php

namespace Styde;

class SpanishTranslator extends Translator
{
	protected $messages = [
		'BasicBowAttack' => ':unit dispara una flecha a :opponent',
		'BasicSwordAttack' => ':unit ataca con la espada a :opponent',
		'CrossBowAttack' => ':unit dispara una flecha a :opponent',
		'FireBowAttack' => ':unit dispara una flecha de fuego a :opponent',
		'move' => ':unit camina hacia :direction',
		'takeDamage' => ':unit ahora tiene :hp puntos de vida',
		'die' => ':unit muere',
	];
}
