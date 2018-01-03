<?php

namespace Styde\Weapons;

use Styde\Unit;

class BasicBow extends Bow
{
	protected $damage = 20;

	public function getAttackMsg(Unit $attacker, Unit $opponent)
	{
		return "{$attacker->getName()} dispara una flecha a {$opponent->getName()}";
	}
}