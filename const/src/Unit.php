<?php

namespace Styde;

class Unit
{
	private const MAX_DAMAGE = 100;

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
		Log::info("{$this->name} camina hacia $direction");
	}

	public function attack(Unit $opponent)
	{
		$attack = $this->weapon->createAttack();

		Log::info($attack->getDescription($this, $opponent));

		$opponent->takeDamage($attack);
	}

	public function takeDamage(Attack $attack)
	{
		$this->setHp($this->armor->absorbDamage($attack));

		Log::info("{$this->name} ahora tiene {$this->getHp()} puntos de vida");

		if ($this->hp <= 0) {
			$this->die();
		}
	}

	protected function setHp($damage)
	{
		if ($damage > static::MAX_DAMAGE) {
			$damage = static::MAX_DAMAGE;
		}

		$this->hp = $this->hp - $damage;
	}

	public function die()
	{
		Log::info("{$this->name} muere");

		exit();
	}
}
