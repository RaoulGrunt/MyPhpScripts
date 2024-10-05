<?php

namespace Framework\RGDND;

require_once __DIR__ . '/Config/config.php';
require_once FRAMEWORK_RGDND_ROOT . '/Character.php';

// ToDo: Browse the profiles and give choice to pick
$profile = FRAMEWORK_RGDND_PROFILE_CHARACTERS . '/Phoenix';

$creature = new Character($profile);
$creature->printCharacterSheet();
