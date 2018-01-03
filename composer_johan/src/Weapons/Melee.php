<?php

namespace Styde\Weapons;

use Styde\Weapon;
use Styde\Unit;

abstract class Melee implements Weapon
{
	abstract public function giveDamage($damage);

	public function getAttackMsg(Unit $attacker, Unit $opponent)
	{
		return "{$attacker->getName()} ataca cuerpo a cuerpo a {$opponent->getName()}";
	}
}