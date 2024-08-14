<?php

require_once __DIR__ . '/Config/Config.php';
require_once SCRIPT_FACTORIES . '/LootSheetFactory.php';

/**
 * Run the updateLootSheet functionality
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses LootSheetFactory 1.0.0
 * @version 1.0.0
 */

try {
    LootSheetFactory::createLootSheetCoordinator()->updateLootSheet();
} catch(Exception $e) {
    print('Script exited with error: ' . $e->getMessage());
}
