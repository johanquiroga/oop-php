<?php

namespace Styde;

class EnglishTranslator implements Translator
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

	public function get($key, array $params = array())
	{
		if (! $this->has($key)) {
			return "[$key]";
		}

		return $this->replaceParams($this->messages[$key], $params);
	}

	public function has($key)
	{
		return isset($this->messages[$key]);
	}

	public function replaceParams($message, array $params)
	{
		foreach ($params as $key => $value) {
			$message = str_replace(":$key", $value, $message);
		}

		return $message;
	}
}
