<?php

require_once FRAMEWORK_DATABASE_FACTORIES . '/DataFactory.php';
require_once SCRIPT_CONVERTERS . '/DatabaseResultConverter.php';
require_once FRAMEWORK_DATABASE_FACTORIES . '/WrapperFactory.php';

use Framework\Databases as Databases;

/**
 * DatabaseReaderBase
 * 
 * Base class for handler classes
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses Databases\DataFactory 1.0.0
 * @uses DatabaseResultConverter 1.1.0
 * @uses Framework\Databases\WrapperFactory 1.0.0
 * @version 1.1.0
 */
abstract class DatabaseReaderBase
{
    /** @var Databases\MySqlWrapper $wrapper */
    protected Databases\MySqlWrapper $wrapper;

    /**
     * Get the loot required for the specified bazaar item
     * 
     * @param string[] $select The select statement for the bazaar loot
     * @param string $bazaarName The name of the bazaar item
     * @return BazaarLoot[]
     */
    protected function runGetBazaarLoot(array $select, string $bazaarName): array
    {
        $from = 'Loot';
        $where = 'Bazaar.Name = \'' . str_replace("'", "''", $bazaarName) . '\'';
        $joins = array(Databases\DataFactory::createJoin('INNER', 'BazaarLoot', 'Loot.Id', 'BazaarLoot.LootId'), 
                       Databases\DataFactory::createJoin('INNER', 'Bazaar', 'BazaarLoot.BazaarId', 'Bazaar.Id'));
        $selectQuery = Databases\DataFactory::createMySqlSelectQuery($select, $from, $where, $joins);
        $databaseResult = $this->wrapper->select($selectQuery);
        return DatabaseResultConverter::convertBazaarLootResult($databaseResult);
    }

    /**
     * Set the properties of the class
     */
    protected function setClassProperties()
    {
        $this->wrapper = Databases\WrapperFactory::createMySqlWrapper(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }
}