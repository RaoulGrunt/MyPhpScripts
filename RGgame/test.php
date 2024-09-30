<?php

require_once __DIR__ . '/Config/config.php';
require_once FRAMEWORK_RGDND_ROOT . '/Character.php';

use Framework\RGDND\Character;

$phoenixProfile = __DIR__ . '/Profiles/Creatures/Phoenix';
$creature = new Character($phoenixProfile);

$creature->performSave(SAVE_INTELLIGENCE, 13);
$creature->performSkill(SKILL_HISTORY, 15);
