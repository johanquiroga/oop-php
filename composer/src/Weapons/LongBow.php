<?php

namespace Styde\Weapons;

class LongBow extends Bow
{
	public function giveDamage($damage)
	{
		return $damage * 1.25;
	}
}