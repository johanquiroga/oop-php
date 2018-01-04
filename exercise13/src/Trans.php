<?php

namespace Styde;

class Trans
{
	protected static $translator;

	public static function setTranslator(Translator $translator)
	{
		static::$translator = $translator;
	}

	public static function get($key, array $params = array())
	{
		return static::$translator->get($key, $params);
	}

	public static function has($key)
	{
		return static::$translator->has($key);
	}

	public static function replaceParams($message, array $params)
	{
		return static::$translator->replaceParams($message, $params);
	}
}
