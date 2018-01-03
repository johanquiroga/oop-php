<?php

namespace Styde;

interface Weapon
{
	public function giveDamage($damage);

	public function getAttackMsg(Unit $attacker, Unit $opponent);
}