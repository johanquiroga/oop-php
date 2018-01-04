<?php

namespace Styde;

require '../vendor/autoload.php';

Trans::setTranslator(new EnglishTranslator);

Log::setLogger(new HtmlLogger);

$ramm = Unit::createSoldier('Ramm')
			->setWeapon(new Weapons\BasicSword)
			->setArmor(new Armors\SilverArmor)
			->setShield();

$silence = new Unit('Silence', new Weapons\FireBow);

$silence->attack($ramm);
$silence->attack($ramm);

$ramm->attack($silence);
