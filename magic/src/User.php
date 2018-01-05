<?php

namespace Styde;

class User extends Model
{
	protected $lunch;

	public function __constuct(array $attributes = [])
	{
		parent::__constuct($attributes);

		$this->lunch = new LunchBox();
	}

	public function setLunch(LunchBox $lunch)
	{
		$this->lunch = $lunch;
	}

	public function eat()
	{
		if ($this->lunch->isEmpty()) {
			throw new \Exception("{$this->name} no tiene nada para comer", 1);
		}

		echo "<p>{$this->name} almuerza {$this->lunch->shift()}</p>";
	}
}
