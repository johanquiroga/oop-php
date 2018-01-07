<?php

/*
* Comparison between Value Objects
*/
class Time
{
	protected $time = null;
	protected $timezone;

	public function __construct($time = null, $timezone = 'Europe/London')
	{
		$this->time = $time ?: time();
		$this->timezone = $timezone;
	}

	public function __toString()
	{
		return date('d/m/Y H:i:s', $this->time);
	}

	public function tomorrow()
	{
		return new Time($this->time + 24*60*60);
	}

	public function yesterday()
	{
		return new Time($this->time - 24*60*60);
	}
}

class MyTime extends Time
{

}

$today = new Time();

$today2 = new Time();

/*if ($today == $today2) {
	echo "V";
} else {
	echo "F";
}*/

/***************************************************************/

/*
* Comparison between non Value Objects Classes
*/
class Person
{
	public $id;

	public $name;

	public $online = false;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function is($otherPerson)
	{
		return $this->id == $otherPerson->id;
	}
}

$duilio = new Person('Duilio');
$duilio->id = 1;
$duilio->online = true;

$duilio2 = new Person('Duilio');
$duilio2->id = 1;

if ($duilio->is($duilio2)) {
	echo "V";
} else {
	echo "F";
}