<?php

namespace Styde;

class User
{
	protected $attributes = [];

	public function __construct(array $attributes = [])
	{
		$this->fill($attributes);
	}

	public function fill(array $attributes = [])
	{
		$this->attributes = $attributes;
	}

	public function getFirstNameAttribute()
	{
		return strtoupper($this->first_name);
	}

	public function getAttributes()
	{
		return $this->attributes;
	}

	public function getAttribute($name)
	{
		if (array_key_exists($name, $this->attributes)) {
			return $this->attributes[$name];
		}
	}

	public function setAttribute($name, $value)
	{
		$this->attributes[$name] = $value;
	}

	public function hasAttribute($name)
	{
		return isset($this->attributes[$name]);
	}

	public function removeAttribute($name)
	{
		unset($this->attributes[$name]);
	}

	public function __set($name, $value)
	{
		$this->setAttribute($name, $value);
	}

	public function __get($name)
	{
		return $this->getAttribute($name);
	}

	public function __isset($name)
	{
		return $this->hasAttribute($name);
	}

	public function __unset($name)
	{
		$this->removeAttribute($name);
	}
}
