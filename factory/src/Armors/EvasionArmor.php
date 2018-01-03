<?php

namespace Styde\Armors;

use Styde\Armor;
use Styde\Attack;

class EvasionArmor extends Armor
{
	public function absorbDamage(Attack $attack)
	{
		if (rand(0,1)) {
			return 0;
		} else {
			return $attack->getDamage();
		}
	}
}