<?php

namespace Styde;

use Styde\Weapons\Melee;

class Soldier extends Unit
{
	protected $damage = 40;

	public function __construct($name, Melee $melee = null)
	{
		parent::__construct($name, $melee);
	}

	public function setWeapon(Weapon $weapon = null)
	{
		if ($weapon instanceof Melee) {
			$this->weapon = $weapon;
		} else {
			throw new \Exception("Error setting weapon. Soldier can only have Melee weapons.", 1);
		}
	}
}