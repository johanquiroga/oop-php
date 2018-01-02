<?php

/**
* Ejercicios propuesto:
*
* 1.- Refactorizar para que el arquero también pueda tener armadura.
*
* 2.- Crear una armadura llamada armadura de la evasión que va a permitir evadir 
* la mitad de los ataques.
*
* 3.- Refactorizar para evitar que nuestros personajes tengan puntos negativos de vida.
*
* 4.- Pensar cómo podría hacer para que tanto como tus soldados como tus arqueros 
* tengan diferentes armas. Por ejemplo, qué un soldado pueda tener un acha o que 
* un arquero pueda tener un arco largo.
*
*/

function show($message)
{
	echo "<p>$message</p>";
}

abstract class Unit
{
	protected $hp = 40;
	protected $name;
	protected $armor;
	protected $weapon;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getHp()
	{
		if ($this->hp <= 0) {
			$this->hp = 0;
		}

		return $this->hp;
	}

	public function setArmor(Armor $armor = null)
	{
		$this->armor = $armor;
	}

	public function setWeapon(Weapon $weapon = null)
	{
		$this->weapon = $weapon;
	}

	public function move($direction)
	{
		show("{$this->name} camina hacia $direction");
	}

	abstract public function attack(Unit $opponent);

	public function takeDamage($damage)
	{
		$this->hp = $this->hp - $this->absorbDamage($damage);

		show("{$this->name} ahora tiene {$this->getHp()} puntos de vida");

		if ($this->hp <= 0) {
			$this->die();
		}

	}

	public function die()
	{
		show("{$this->name} muere");

		exit();
	}

	protected function absorbDamage($damage)
	{
		if($this->armor) {
			$damage = $this->armor->absorbDamage($damage);
		}

		return $damage;
	}

	protected function giveDamage()
	{
		if($this->weapon) {
			$damage = $this->weapon->giveDamage($this->damage);
		} else {
			$damage = $this->damage;
		}

		return $damage;
	}
}

class Soldier extends Unit
{
	protected $damage = 40;

	public function attack(Unit $opponent)
	{
		show("{$this->name} ataca con la espada a {$opponent->getName()}");

		$opponent->takeDamage($this->giveDamage());
	}
}

class Archer extends Unit
{
	protected $damage = 20;

	public function attack(Unit $opponent)
	{
		show("{$this->name} dispara una flecha a {$opponent->getName()}");

		$opponent->takeDamage($this->giveDamage());
	}
}

interface Armor
{
	public function absorbDamage($damage);
}

class BronzeArmor implements Armor
{
	public function absorbDamage($damage)
	{
		return $damage / 2;
	}
}

class SilverArmor implements Armor
{
	public function absorbDamage($damage)
	{
		return $damage / 3;
	}
}

class CursedArmor implements Armor
{
	public function absorbDamage($damage)
	{
		return $damage * 2;
	}
}

class EvasionArmor implements Armor
{
	public function absorbDamage($damage)
	{
		if(rand(0,1)) {
			return 0;
		} else {
			return $damage;
		}
	}
}

interface Weapon
{
	public function giveDamage($damage);
}

class Axe implements Weapon
{
	public function giveDamage($damage)
	{
		return $damage * 2;
	}
}

class LongBow implements Weapon
{
	public function giveDamage($damage)
	{
		return $damage * 1.25;
	}
}

$ramm = new Soldier('Ramm');
$ramm->setWeapon(new Axe);
$ramm->setArmor(new BronzeArmor);

$silence = new Archer('Silence');
$silence->setWeapon(new LongBow);
$silence->setArmor(new EvasionArmor);

$silence->attack($ramm);
$ramm->attack($silence);
$silence->attack($ramm);
