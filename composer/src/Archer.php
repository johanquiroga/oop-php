<?php

namespace Styde;

use Styde\Weapons\Bow;

class Archer extends Unit
{
	protected $damage = 20;

	public function __construct($name, Bow $bow = null)
	{
		parent::__construct($name, $bow);
	}

	public function setWeapon(Weapon $weapon = null)
	{
		if ($weapon instanceof Bow) {
			$this->weapon = $weapon;
		} else {
			throw new \Exception("Error setting weapon. Archer can only have Bow weapons.", 1);
		}
	}
}