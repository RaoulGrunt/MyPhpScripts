<?php

namespace Framework\Databases;

/**
 * SelectQueryBase
 *
 * A base class for a select query
 *
 * @author Raoul de Grunt
 * @package Framework\Databases
 * @version 1.0.0
 */
abstract class SelectQueryBase
{
    /** @var string[] $select The select statement */
    protected array $select;
    /** @var string $from The from statement */
    protected string $from;
    /** @var string $where The where statement */
    protected string $where;
    /** @var Join[] $joins The join statements */
    protected array $joins;

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
    public function __construct(array $select, string $from, string $where = '', array $joins = [])
    {
        $this->setClassProperties($select, $from, $where, $joins);
    }

    /**
     * Check if the query values are valid
     */
    public function isValid()
    {
        return !empty($this->select) && !empty($this->from);
    }

    /**
     * Set the class properties
     * 
     * @param string[] $select The select statement
     * @param string $from The from statement
     * @param string $where The where statement
     * @param Join[] $joins The join statements
     */
    private function setClassProperties(array $select, string $from, string $where = '', array $joins = [])
    {
        $this->select = $select;
        $this->from = $from;
        $this->where = $where;
        $this->joins = $joins;
    }
}