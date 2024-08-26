<?php

require_once SCRIPT_BASECLASSES . '/HandlerBase.php';
require_once SCRIPT_DATA . '/LootOutput.php';
require_once SCRIPT_FACTORIES . '/LootSheetFactory.php';

/**
 * LootSheetHandler
 * 
 * Class that handles the loot for processing
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses HandlerBase 1.0.0
 * @uses LootSheetFactory 1.1.0
 * @version 1.0.1
 */
class LootSheetHandler extends HandlerBase
{
    /**
     * Get the output for every specified loot item
     * 
     * @param string[] $lootList The list of loot to handle
     * @return LootOutput[]
     */
    public function getLootOutput(array $lootList): array
    {
        return $this->getOutput($lootList);
    }

    /**
     * Get the LootOutput for the specified loot
     * 
     * @param string $lootName The name of the loot item
     * @return LootOutput
     */
    protected function getOutputFor(string $lootName): LootOutput
    {
        $databaseReader = LootSheetFactory::createLootSheetDatabaseReader();
        $output = LootSheetFactory::createLootOutput($lootName);
        foreach ($databaseReader->getBazaarNames($lootName) as $bazaarName) {
            $bazaarLoot = $databaseReader->getBazaarLoot($bazaarName);
            $output->addBazaarLoot($bazaarLoot, $lootName);
        }
        return $output;
    }
}