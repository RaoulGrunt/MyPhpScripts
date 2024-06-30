<?php

define('COMPLETION_SHEET_ID', '');
define('SHEET_LOOT_NAME_RANGE', 'Loot!C2:C235');
define('SHEET_LOOT_UPDATE_RANGE', 'Loot!D2:L235');

define('DB_SERVER', '');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_NAME', '');

require_once(__DIR__ . '/../../Framework/Databases/Config/Config.php');
require_once(__DIR__ . '/../../Framework/Google/Config/Config.php');

define('FF12_ROOT', __DIR__ . '/..');
define('FF12_CONVERTERS', FF12_ROOT . '/Converters');
define('FF12_COORDINATORS', FF12_ROOT . '/Coordinators');
define('FF12_DATA', FF12_ROOT . '/Data');
define('FF12_FACTORIES', FF12_ROOT . '/Factories');
define('FF12_HANDLERS', FF12_ROOT . '/Handlers');
define('FF12_READERS', FF12_ROOT . '/Readers');
define('FF12_WRITERS', FF12_ROOT . '/Writers');