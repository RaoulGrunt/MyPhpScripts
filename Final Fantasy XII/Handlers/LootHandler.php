<?php

require_once FF12_BASECLASSES . '/HandlerBase.php';
require_once FF12_DATA . '/LootOutput.php';
require_once FF12_FACTORIES . '/FF12Factory.php';

/**
 * LootHandler
 * 
 * Class that handles the loot for processing
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.1.0
 */
class LootHandler extends HandlerBase
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
        $result = FF12Factory::createLootOutput($lootName);
        $databaseReader = FF12Factory::createDatabaseReader();
        foreach ($databaseReader->getBazaarNames($lootName) as $bazaarName) {
            $bazaarLoot = $databaseReader->getBazaarLoot($bazaarName);
            $result->addBazaarLoot($bazaarLoot, $lootName);
        }
        return $result;
    }
}