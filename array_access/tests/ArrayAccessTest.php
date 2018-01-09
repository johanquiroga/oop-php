<?php

use Styde\Model;

class ModelArrayAccessTest extends PHPUnit\Framework\TestCase
{
	public function test_offset_get()
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

	public function test_offset_exists()
	{
		$user = new UserTest([
			'name' => 'Johan Quiroga',
		]);

		$this->assertTrue(isset($user['name']));

		$this->assertFalse(empty($user['name']));

		$this->assertFalse(isset($user['email']));

		$this->assertTrue(empty($user['email']));
	}

	/** @test **/
	function it_set_and_get_values_with_array_access()
	{
		$user = new UserTest();

		$user['name'] = 'Johan Quiroga';

		$this->assertSame('Johan Quiroga', $user['name']);
	}

	/** @test **/
	function it_can_set_and_unset_properties_with_array_access()
	{
		$user = new UserTest();

		$user['name'] = 'Johan Quiroga';

		$this->assertTrue(isset($user['name']));

		unset($user['name']);

		$this->assertFalse(isset($user['name']));
	}
}

class UserTest extends Model implements ArrayAccess
{
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