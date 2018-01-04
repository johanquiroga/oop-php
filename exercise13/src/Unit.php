<?php

namespace Styde;

class Unit
{
	protected $hp = 40;
	protected $name;
	protected $armor;
	protected $weapon;

	public function __construct($name, Weapon $weapon)
	{
		$this->name = $name;
		$this->weapon = $weapon;
		$this->armor = new Armors\MissingArmor;
	}

	public static function createSoldier($name)
	{
		$soldier = new Unit($name, new Weapons\BasicSword);
		$soldier->setArmor(new Armors\BronzeArmor);

		return $soldier;
	}

	public function setWeapon(Weapon $weapon)
	{
		$this->weapon = $weapon;

		return $this;
	}

	public function setArmor(Armor $armor = null)
	{
		$this->armor = $armor;

		return $this;
	}

	public function setShield()
	{
		return $this;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getHp()
	{
		if ($this->hp < 0) {
			$this->hp = 0;
		}

		return $this->hp;
	}

	public function move($direction)
	{
		Log::info(Trans::get('move', [
			'unit' => $this->name,
			'direction' => $direction,
		]));
	}

	public function attack(Unit $opponent)
	{
		$attack = $this->weapon->createAttack();

		Log::info($attack->getDescription($this, $opponent));

		$opponent->takeDamage($attack);
	}

	public function takeDamage(Attack $attack)
	{
		$this->hp = $this->hp - $this->armor->absorbDamage($attack);
		
		Log::info(Trans::get('takeDamage', [
			'unit' => $this->name,
			'hp' => $this->getHp(),
		]));

		if ($this->hp <= 0) {
			$this->die();
		}
	}

	public function die()
	{
		Log::info(Trans::get('die', [
			'unit' => $this->name,
		]));

		exit();
	}
}
