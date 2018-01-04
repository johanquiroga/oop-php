<?php

namespace Styde;

class SpanishTranslator implements Translator
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
