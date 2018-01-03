<?php

namespace Styde;

use Styde\Weapons\Melee;

class Soldier extends Unit
{
	public function __construct($name, Melee $melee)
	{
		parent::__construct($name, $melee);
	}
}