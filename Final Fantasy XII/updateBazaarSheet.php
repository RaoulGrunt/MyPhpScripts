<?php

require_once(__DIR__ . '/Config/Config.php');
require_once(SCRIPT_FACTORIES . '/BazaarSheetFactory.php');

/**
 * Run the updateBazaarSheet functionality
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses BazaarSheetFactory 1.0.0
 * @version 1.0.0
 */

try {
    BazaarSheetFactory::createBazaarSheetCoordinator()->updateBazaarSheet();
} catch(Exception $e) {
    print('Script exited with error: ' . $e->getMessage());
}
