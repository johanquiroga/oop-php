<?php

namespace Styde;

class EnglishTranslator extends Translator
{
	protected $messages = [
		'BasicBowAttack' => ':unit shots an arrow to :opponent',
		'BasicSwordAttack' => ':unit attacks with the sword to :opponent',
		'CrossBowAttack' => ':unit shots an arrow to :opponent',
		'FireBowAttack' => ':unit shots a fire arrow to :opponent',
		'move' => ':unit walks to :direction',
		'takeDamage' => ':unit now has :hp life points',
		'die' => ':unit dies',
	];
}
