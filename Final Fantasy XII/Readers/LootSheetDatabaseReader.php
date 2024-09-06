<?php

require_once SCRIPT_BASECLASSES . '/DatabaseReaderBase.php';

use Framework\Databases as Databases;

/**
 * LootSheetDatabaseReader
 * 
 * Class that reads information from the database and converts the result for the loot sheet
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses DatabaseReaderBase 1.1.0
 * @uses Databases\DataFactory 1.0.0
 * @uses DatabaseResultConverter 1.0.0
 * @version 1.2.0
 */
class LootSheetDatabaseReader extends DatabaseReaderBase
{
    /**
     * Constructor
     * 
     * Set the class properties
     */
    public function __construct()
    {
        $this->setClassProperties();
    }

    /**
     * Get the names from the bazaar items that the specified loot is needed for
     * 
     * @param string $lootName The name of the loot
     * @return string[]
     */
    public function getBazaarNames(string $lootName): array
    {
        $select = array('Bazaar.Name');
        $from = 'Bazaar';
        $where = 'Loot.Name = \'' . $lootName . '\'';
        $joins = array(Databases\DataFactory::createJoin('INNER', 'BazaarLoot', 'Bazaar.Id', 'BazaarLoot.BazaarId'),
                       Databases\DataFactory::createJoin('INNER', 'Loot', 'BazaarLoot.LootId', 'Loot.Id'));
        $selectQuery = Databases\DataFactory::createMySqlSelectQuery($select, $from, $where, $joins);
        $databaseResult = $this->wrapper->select($selectQuery);
        return DatabaseResultConverter::convertSingleColumnValues($databaseResult, 'Name');
    }

    /**
     * Get the loot required for the specified bazaar item
     * 
     * @param string $bazaarName The name of the bazaar item
     * @return BazaarLoot[]
     */
    public function getBazaarLoot(string $bazaarName): array
    {
        $select = array('Loot.Name', 'BazaarLoot.Amount', 'BazaarLoot.Multiply AS Multiply', 'Loot.SheetRow AS LootSheetRow', 'Bazaar.SheetRow AS BazaarSheetRow');
        return $this->runGetBazaarLoot($select, $bazaarName);
    }
}