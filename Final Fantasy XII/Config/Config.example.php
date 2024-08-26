<?php

define('COMPLETION_SHEET_ID', '');
define('SHEET_BAZAAR_NAME_RANGE', 'Bazaar!B2:B122');
define('SHEET_BAZAAR_UPDATE_RANGE', 'Bazaar!D2:D122');
define('SHEET_LOOT_NAME_RANGE', 'Loot!B2:B235');
define('SHEET_LOOT_UPDATE_RANGE', 'Loot!C2:I235');

define('DB_SERVER', '');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_NAME', '');

define('WRITE_OUTPUT', true);

require_once(__DIR__ . '/../../Framework/Databases/Config/Config.php');
require_once(__DIR__ . '/../../Framework/Google/Config/Config.php');

define('SCRIPT_ROOT', __DIR__ . '/..');
define('SCRIPT_BASECLASSES', SCRIPT_ROOT . '/Baseclasses');
define('SCRIPT_CONVERTERS', SCRIPT_ROOT . '/Converters');
define('SCRIPT_COORDINATORS', SCRIPT_ROOT . '/Coordinators');
define('SCRIPT_DATA', SCRIPT_ROOT . '/Data');
define('SCRIPT_FACTORIES', SCRIPT_ROOT . '/Factories');
define('SCRIPT_HANDLERS', SCRIPT_ROOT . '/Handlers');
define('SCRIPT_READERS', SCRIPT_ROOT . '/Readers');
define('SCRIPT_WRITERS', SCRIPT_ROOT . '/Writers');