<?php

require_once FRAMEWORK_DATABASE_FACTORIES . '/DataFactory.php';
require_once FF12_CONVERTERS . '/DatabaseResultConverter.php';
require_once FRAMEWORK_DATABASE_FACTORIES . '/WrapperFactory.php';

use Framework\Databases as Databases;

/**
 * DatabaseReader
 * 
 * Class that reads information from the database and converts the result
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.1
 */
class DatabaseReader
{
    /** @var Databases\MySqlWrapper $wrapper */
    private Databases\MySqlWrapper $wrapper;

    /**
     * Constructor
     * 
     * Set the properties
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
        $joins = array(Databases\DataFactory::createJoin('INNER', 'Loot', 'Bazaar.loot', 'Loot.Id'));
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
        $select = array('Loot.Name', 'Bazaar.Amount', 'Loot.SheetRow');
        $from = 'Bazaar';
        $where = 'Bazaar.Name = \'' . str_replace("'", "''", $bazaarName) . '\'';
        $joins = array(Databases\DataFactory::createJoin('INNER', 'Loot', 'Bazaar.loot', 'Loot.Id'));
        $selectQuery = Databases\DataFactory::createMySqlSelectQuery($select, $from, $where, $joins);
        $databaseResult = $this->wrapper->select($selectQuery);
        return DatabaseResultConverter::convertBazaarLootResult($databaseResult);
    }

    /**
     * Set the properties of the class
     */
    private function setClassProperties()
    {
        $this->wrapper = Databases\WrapperFactory::createMySqlWrapper(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }
}