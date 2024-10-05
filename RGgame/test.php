<?php

require_once __DIR__ . '/Config/config.php';

// Item test
/*
require_once FRAMEWORK_RGDND_ROOT . '/Item.php';
use Framework\RGDND\Item;

$ropeProfile = FRAMEWORK_RGDND_PROFILE_ITEMS . '/RopeHempen';
$rope = new Item($ropeProfile);

print('The ' . $rope->name() . ' is a ' . $rope->description() . ', that costs ' . $rope->cost()->amount() . $rope->cost()->type() . ' and weighs ' . $rope->weight() . ' lb' . PHP_EOL);
*/



//Weapon test
require_once FRAMEWORK_RGDND_ROOT . '/Weapon.php';
use Framework\RGDND\Weapon;

$clubProfile = FRAMEWORK_RGDND_PROFILE_WEAPONS . '/Club';
$weapon = new Weapon($clubProfile);
var_dump($weapon->rollDamage());





//Character test
/*
require_once FRAMEWORK_RGDND_ROOT . '/Character.php';

use Framework\RGDND\Character;

$phoenixProfile = __DIR__ . '/Profiles/Characters/Phoenix';
$creature = new Character($phoenixProfile);

$creature->performSave(SAVE_INTELLIGENCE, 13);
$creature->performSkill(SKILL_HISTORY, 15);
*/
