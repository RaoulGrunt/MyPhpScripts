<?php

require_once SCRIPT_FACTORIES . '/LootSheetFactory.php';

/**
 * Converter class that converts values from the FF12 database
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses LootSheetFactory 1.0.0
 * @version 1.0.2
 */
class DatabaseResultConverter
{
    /**
     * Convert single column values to regular array
     * 
     * @param string[][] $databaseResult The result from the database
     * @param string $columnName The name of the column
     * @return string[]
     */
    public static function convertSingleColumnValues(array $databaseResult, string $columnName): array
    {
        $result = array();
        foreach($databaseResult as $record) {
            $result[] = $record[$columnName];
        }
        return $result;
    }

    /**
     * Convert the bazaar loot query result
     * 
     * @param string[][] $databaseResult The result from the database
     * @return BazaarLoot[]
     */
    public static function convertBazaarLootResult(array $databaseResult): array
    {
        $result = array();
        foreach($databaseResult as $record) {
            $bazaarLoot = LootSheetFactory::createBazaarLoot($record['Name'], $record['Amount'], $record['SheetRow']);
            $result[] = $bazaarLoot;
        }
        return $result;
    }
}