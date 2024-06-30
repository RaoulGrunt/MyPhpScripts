<?php

require_once(__DIR__ . '/Config/Config.php');
require_once(FF12_FACTORIES . '/FF12Factory.php');

try {
    FF12Factory::createCompletionSheetCoordinator()->updateCompletionLootSheet();
} catch(Exception $e) {
    print('Script exited with error: ' . $e->getMessage());
}
