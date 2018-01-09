<?php

use Styde\Model;

class ArrayAccessTest extends PHPUnit\Framework\TestCase
{
	public function test_a_model_has_array_access()
	{
		$user = new UserTest([
			'name' => 'Johan Quiroga',
			'email' => 'johan.c.quiroga@gmail.com',
			'website' => 'http://johanquiroga.me',
		]);

		$this->assertSame('Johan Quiroga', $user['name']);

		$this->assertSame('johan.c.quiroga@gmail.com', $user['email']);

		$this->assertSame('http://johanquiroga.me', $user['website']);
	}
}

class UserTest extends Model implements ArrayAccess
{
	public function offsetExists($offset)
	{
		
	}

	public function offsetGet($offset)
	{
		return $this->getAttribute($offset);
	}

	public function offsetSet($offset, $value)
	{
		return [$offset, $value];
	}

	public function offsetUnSet($offset)
	{

	}
}