<?php

namespace Styde;

abstract class Weapon
{
	protected $damage = 0;

	public function getDamage()
	{
		return $this->damage;
	}

	abstract public function getAttackMsg(Unit $attacker, Unit $opponent);
}