<?php

namespace Styde\Weapons;

use Styde\Unit;

class BasicSword extends Melee
{
	protected $damage = 40;

	public function getAttackMsg(Unit $attacker, Unit $opponent)
	{
		return "{$attacker->getName()} ataca cuerpo a cuerpo a {$opponent->getName()}";
	}
}