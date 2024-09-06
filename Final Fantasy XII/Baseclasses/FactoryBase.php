<?php

require_once SCRIPT_DATA . '/BazaarLoot.php';

/**
 * FactoryBase
 * 
 * Class that created objects from the Final Fantasy 12 folder
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses BazaarLoot 1.2.0
 * @version 1.2.0
 */
abstract class FactoryBase
{
    /**
     * Create a BazaarLoot object
     * 
     * @param string $lootName Name of the loot
     * @param int $amount The amount needed
     * @param int $lootSheetRow The rownumber where the loot is in the sheet
     * @param int $bazaarSheetRow The row number where the bazaar item is in the sheet
     * @return BazaarLoot
     */
    public static function createBazaarLoot(string $lootName, int $amount, int $multiply, int $lootSheetRow, int $bazaarSheetRow): BazaarLoot
    {
        return new BazaarLoot($lootName, $amount, $multiply, $lootSheetRow, $bazaarSheetRow);
    }
}