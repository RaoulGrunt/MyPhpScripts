<?php

require_once SCRIPT_FACTORIES . '/LootSheetFactory.php';

/**
 * Converter class that converts values from the FF12 database
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses LootSheetFactory 1.1.0
 * @version 1.0.3
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
            $bazaarLoot = LootSheetFactory::createBazaarLoot($record['Name'], $record['Amount'], $record['LootSheetRow'], self::getBazaarSheetRowValue($record));
            $result[] = $bazaarLoot;
        }
        return $result;
    }

    /**
     * Get the value of BazaarSheetValue, if not present return 0
     * 
     * @param string[] $record The database record
     * @return string
     */
    private static function getBazaarSheetRowValue(array $record): string
    {
        if (!key_exists('BazaarSheetRow', $record)) {
            return '0';
        }
        return $record['BazaarSheetRow'];
    }
}