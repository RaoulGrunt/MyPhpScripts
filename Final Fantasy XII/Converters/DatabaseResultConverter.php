<?php

require_once FF12_FACTORIES . '/FF12Factory.php';

/**
 * Converter class that converts values from the FF12 database
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.0
 */
class DatabaseResultConverter
{
    /**
     * Convert single column values to regular array
     * 
     * @var string[][] $databaseResult The result from the database
     * @var string $columnName The name of the column
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
     * @var string[][] $databaseResult The result from the database
     * @return BazaarLoot[]
     */
    public static function convertBazaarLootResult(array $databaseResult): array
    {
        $result = array();
        foreach($databaseResult as $record) {
            $bazaarLoot = FF12Factory::createBazaarLoot($record['Name'], $record['Amount'], $record['SheetRow']);
            $result[] = $bazaarLoot;
        }
        return $result;
    }
}