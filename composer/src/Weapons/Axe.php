<?php

namespace Styde\Weapons;

class Axe extends Melee
{
	public function giveDamage($damage)
	{
		return $damage * 2;
	}
}