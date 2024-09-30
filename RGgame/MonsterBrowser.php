<?php

require_once __DIR__ . '/Config/config.php';
require_once FRAMEWORK_RGDND_ROOT . '/Monster.php';

use Framework\RGDND\Monster;

// ToDo: Browse the profiles and give choice to pick
$profile = 'Commoner';

$creature = new Monster(RGGAME_MONSTERS_PROFILES . '/' . $profile);
$creature->printMonsterSheet();
