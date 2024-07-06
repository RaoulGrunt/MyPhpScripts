<?php

require_once FF12_FACTORIES . '/FF12Factory.php';

/**
 * CompletionSheetCoordinator
 * 
 * The coordinator class for the completion sheet
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.1.0
 */
class CompletionSheetCoordinator
{
    /**
     * Update the bazaar sheet
     */
    public function updateCompletionBazaarSheet()
    {
        $bazaarList = FF12Factory::createCompletionSheetReader()->getBazaarNames();
        $output = FF12Factory::createBazaarHandler()->getBazaarOutput($bazaarList);
        FF12Factory::createCompletionSheetWriter()->writeBazaarInformation($output);
    }

    /**
     * Update the loot sheet
     */
    public function updateCompletionLootSheet()
    {
        $lootList = FF12Factory::createCompletionSheetReader()->getLootNames();
        $output = FF12Factory::createLootHandler()->getLootOutput($lootList);
        FF12Factory::createCompletionSheetWriter()->writeLootInformation($output);
    }
}