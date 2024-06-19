<?php

namespace Framework\Databases;

require_once FRAMEWORK_DATABASE_BASECLASSES . '/SelectQueryBase.php';

/**
 * MySqlSelectQuery
 *
 * A data class for a MySql query
 *
 * @author Raoul de Grunt
 * @package Framework\Databases
 * @uses SelectQueryBase 1.0.0
 * @version 1.0.1
 */
class MySqlSelectQuery extends SelectQueryBase
{
    /**
     * Constructor
     * 
     * Set the specified select query parts
     * 
     * @param string[] $select The select statement
     * @param string $from The from statement
     * @param string $where The where statement
     * @param Join[] $joins The join statements
     */
    public function __construct(array $select, string $from, string $where, array $joins)
    {
        parent::__construct($select, $from, $where, $joins);
    }

    /**
     * Create the select query
     * 
     * @return string
     */
    public function createSelectQuery(): string
    {
        $result = $this->createSelectStatement();
        $result = $this->addFromStatement($result);
        $result = $this->addJoinStatements($result);
        return $this->addWhereStatement($result);
    }

    /**
     * Get select statement string
     * 
     * @param string[] $select Columns to select
     * @return string The select statement
     */
    private function createSelectStatement(): string
    {
        return 'SELECT ' . implode(', ', $this->select);
    }

    /**
     * Add from statement to string
     * 
     * @param string $sql String to add to
     * @return string The from statement added to the previous sql
     */
    private function addFromStatement(string $sql): string
    {
        return $sql . ' FROM ' . $this->from;
    }

    /**
     * Add join statement to string
     * 
     * @param string $sql String to add to
     * @return string The join statement added to the previous sql
     */
    private function addJoinStatements(string $sql): string
    {
        if (empty($this->joins)) {
            return $sql;
        }
        foreach ($this->joins as $join) {
            $sql = $sql . ' ' . $join->getType() . ' JOIN ' . $join->getTable() .' ON '. $join->getOn1() . '=' . $join->getOn2();
        }
        return $sql;
    }

    /**
     * Add where statement to string
     * 
     * @param string $sql String to add to
     * @return string The where statement added to the previous sql
     */
    private function addWhereStatement(string $sql): string
    {
        if (empty($this->where)) {
            return $sql;
        }
        return $sql . ' WHERE ' . $this->where;
    }
}