<?php

namespace Styde;

use ArrayAccess;

abstract class Model implements ArrayAccess
{
	protected $attributes = [];

	public function __construct(array $attributes = [])
	{
		$this->fill($attributes);
	}

	public function fill(array $attributes = [])
	{
		$this->attributes = array_merge($this->attributes, $attributes);
	}

	public function getAttributes()
	{
		return $this->attributes;
	}

	public function getAttribute($name)
	{
		$value = $this->getAttributeValue($name);

		if ($this->hasGetMutator($name)) {
			return $this->mutateAttribute($name, $value);
		}

		return $value;
	}

	protected function hasGetMutator($name)
	{
		return method_exists($this, 'get'.ucfirst($name).'Attribute');
	}

	protected function mutateAttribute($name, $value)
	{
		return $this->{'get'.ucfirst($name).'Attribute'}($value);
	}

	public function getAttributeValue($name)
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

	public function offsetExists($offset)
	{
		return isset($this->$offset);
	}

	public function offsetGet($offset)
	{
		return $this->$offset;
	}

	public function offsetSet($offset, $value)
	{
		$this->$offset = $value;
	}

	public function offsetUnSet($offset)
	{
		unset($this->$offset);
	}
}
