<?php

require_once __DIR__ . '/Config/config.php';
require_once FRAMEWORK_RGDND_ROOT . '/Character.php';

use Framework\RGDND\Character;

// ToDo: Browse the profiles and give choice to pick
$profile = 'Phoenix';

$creature = new Character(RGGAME_CHARACTERS_PROFILES . '/' . $profile);
$creature->printCharacterSheet();
