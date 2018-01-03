<?php

namespace Styde\Armors;

use Styde\Armor;

class EvasionArmor implements Armor
{
	public function absorbDamage($damage)
	{
		if (rand(0,1)) {
			return 0;
		} else {
			return $damage;
		}
	}
}