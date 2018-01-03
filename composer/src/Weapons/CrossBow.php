<?php

namespace Styde\Weapons;

use Styde\Unit;

class CrossBow extends Bow
{
	protected $damage = 40;

	public function getAttackMsg(Unit $attacker, Unit $opponent)
	{
		return "{$attacker->getName()} dispara una flecha a {$opponent->getName()}";
	}
}