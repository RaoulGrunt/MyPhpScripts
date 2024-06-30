<?php

require_once FF12_FACTORIES . '/FF12Factory.php';

/**
 * CompletionSheetCoordinator
 * 
 * The coordinator class for the completion sheet
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.0
 */
class CompletionSheetCoordinator
{
    /**
     * Update the loot sheet
     */
    public function updateCompletionLootSheet()
    {
        $lootList = FF12Factory::createCompletionSheetReader()->getLootNames();
        $output = FF12Factory::createBazaarLootHandler()->getLootOutput($lootList);
        FF12Factory::createCompletionSheetWriter()->writeLootInformation($output);
    }
}