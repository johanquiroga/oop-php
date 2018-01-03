<?php

namespace Styde;

require '../vendor/autoload.php';

$ramm = new Soldier('Ramm');
$ramm->setWeapon(new Weapons\Axe);
$ramm->setArmor(new Armors\BronzeArmor);

$silence = new Archer('Silence');
$silence->setWeapon(new Weapons\LongBow);
$silence->setArmor(new Armors\EvasionArmor);

$silence->attack($ramm);
$ramm->attack($silence);
$silence->attack($ramm);
