<?php

namespace Framework\Databases;

require_once FRAMEWORK_DATABASE_DATA . '/MySqlSelectQuery.php';
require_once FRAMEWORK_DATABASE_DATA . '/Join.php';

/**
 * DataFactory
 * 
 * Class that creates database data objects
 *
 * @author Raoul de Grunt
 * @package Framework\Databases
 * @version 1.0.0
 */
class DataFactory
{
    /**
     * Create a MySqlSelectQuery objects
     * 
     * @param string[] $select The select statement
     * @param string $from The from statement
     * @param string $where The where statement
     * @param Join[] $joins The join statements
     * @return MySqlSelectQuery
     */
    public static function createMySqlSelectQuery(array $select, string $from, string $where = '', array $joins = []): MySqlSelectQuery
    {
        return new MySqlSelectQuery($select, $from, $where, $joins);
    }

    /**
     * Create a Join object
     * 
     * @param string $type The type of join
     * @param string $table The table to join with
     * @param string $on1 The first column to join on
     * @param string $on1 The second column to join on
     * @return Join
     */
    public static function createJoin(string $type, string $table, string $on1, string $on2): Join
    {
        return new Join($type, $table, $on1, $on2);
    }
}