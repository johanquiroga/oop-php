<?php

namespace Styde\Armors;

use Styde\Armor;
use Styde\Attack;

class CursedArmor extends Armor
{
	public function absorbDamage(Attack $attack)
	{
		return $attack->getDamage() * 2;
	}
}