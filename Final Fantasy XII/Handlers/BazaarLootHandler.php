<?php

require_once FF12_FACTORIES . '/FF12Factory.php';

/**
 * BazaarLootHandler
 * 
 * Class that handles the bazaar loot
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.0
 */
class BazaarLootHandler
{
    /**
     * Get the output for every specified loot item
     * 
     * @var string[] $lootList The list of loot to handle
     * @return LootOutput[]
     */
    public function getLootOutput(array $lootList): array
    {
        $result = array();
        foreach ($lootList as $loot) {
            $result[] = $this->getLootOutputFor($loot);
        }
        return $result;
    }

    /**
     * Get the LootOutput for the specified loot
     * 
     * @var string $lootName The name of the loot item
     * @return LootOutput
     */
    private function getLootOutputFor(string $lootName): LootOutput
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