<?php

require_once SCRIPT_DATA . '/BazaarLoot.php';

/**
 * FactoryBase
 * 
 * Class that created objects from the Final Fantasy 12 folder
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses BazaarLoot 1.0.0
 * @version 1.0.0
 */
abstract class FactoryBase
{
    /**
     * Create a BazaarLoot object
     * 
     * @param string $lootName Name of the loot
     * @param int $amount The amount needed
     * @param int $sheetRow The rownumber where the loot is in the sheet
     * @return BazaarLoot
     */
    public static function createBazaarLoot(string $lootName, int $amount, int $sheetRow): BazaarLoot
    {
        return new BazaarLoot($lootName, $amount, $sheetRow);
    }
}