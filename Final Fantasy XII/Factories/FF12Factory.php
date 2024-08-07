<?php

require_once FF12_COORDINATORS . '/CompletionSheetCoordinator.php';
require_once FF12_READERS . '/CompletionSheetReader.php';
require_once FF12_HANDLERS . '/BazaarHandler.php';
require_once FF12_HANDLERS . '/LootHandler.php';
require_once FF12_READERS . '/DatabaseReader.php';
require_once FF12_DATA . '/BazaarLoot.php';
require_once FF12_DATA . '/BazaarOutput.php';
require_once FF12_DATA . '/LootOutput.php';
require_once FF12_WRITERS . '/CompletionSheetWriter.php';

/**
 * FF12Factory
 * 
 * Class that created objects from the Final Fantasy 12 folder
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.1.0
 */
class FF12Factory
{
    /**
     * Create a CompletionSheetCoordinator object
     * 
     * @return CompletionSheetCoordinator
     */
    public static function createCompletionSheetCoordinator(): CompletionSheetCoordinator
    {
        return new CompletionSheetCoordinator();
    }

    /**
     * Create a CompletionSheetReader object
     * 
     * @return CompletionSheetReader
     */
    public static function createCompletionSheetReader(): CompletionSheetReader
    {
        return new CompletionSheetReader();
    }

    /**
     * Create a BazaarHandler object
     * 
     * @return BazaarHandler
     */
    public static function createBazaarHandler(): BazaarHandler
    {
        return new BazaarHandler();
    }

    /**
     * Create a LootHandler object
     * 
     * @return LootHandler
     */
    public static function createLootHandler(): LootHandler
    {
        return new LootHandler();
    }

    /**
     * Create a DatabaseReader object
     * 
     * @return DatabaseReader
     */
    public static function createDatabaseReader(): DatabaseReader
    {
        return new DatabaseReader();
    }

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

    /**
     * Create a BazaarOutput object
     * 
     * @param array $bazaarLoot Array of bazaar loot 
     * @return BazaarOutput
     */
    public static function createBazaarOutput(array $bazaarLoot): BazaarOutput
    {
        return new BazaarOutput($bazaarLoot);
    }

    /**
     * Create a LootOutput object
     * 
     * @param string $lootName Name of the loot to create output for
     * @return LootOutput
     */
    public static function createLootOutput(string $lootName): LootOutput
    {
        return new LootOutput($lootName);
    }

    /**
     * Create a CompletionSheetWriter object
     * 
     * @return CompletionSheetWriter
     */
    public static function createCompletionSheetWriter(): CompletionSheetWriter
    {
        return new CompletionSheetWriter();
    }
}