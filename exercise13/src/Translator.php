<?php

namespace Styde;

abstract class Translator
{
	protected $messages = [
		//
	];

	// public function set(array $messages);

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