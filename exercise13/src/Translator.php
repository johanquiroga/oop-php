<?php

namespace Styde;

interface Translator
{
	// public function set(array $messages);
	public function get($key, array $params = array());
	public function has($key);
	public function replaceParams($message, array $params);
}