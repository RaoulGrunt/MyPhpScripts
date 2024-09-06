<?php

require_once SCRIPT_FACTORIES . '/LootSheetFactory.php';

/**
 * LootSheetCoordinator
 * 
 * The coordinator class for the update loot sheet script
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses LootSheetFactory 1.2.0
 * @version 1.0.1
 */
class LootSheetCoordinator
{
    /**
     * Update the loot sheet
     */
    public function updateLootSheet()
    {
        $lootList = LootSheetFactory::createLootSheetSheetReader()->getLootNames();
        $output = LootSheetFactory::createLootSheetHandler()->getLootOutput($lootList);
        LootSheetFactory::createLootSheetSheetWriter()->writeLootInformation($output);
    }
}