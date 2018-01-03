<?php

namespace Styde\Weapons;

use Styde\Weapon;
use Styde\Unit;

abstract class Bow implements Weapon
{
	abstract public function giveDamage($damage);

	public function getAttackMsg(Unit $attacker, Unit $opponent)
	{
		return "{$attacker->getName()} dispara una flecha a {$opponent->getName()}";
	}
}