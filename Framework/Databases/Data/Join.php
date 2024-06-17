<?php

namespace Framework\Databases;

/**
 * Join
 *
 * A data class for a join clause
 *
 * @author Raoul de Grunt
 * @package Framework\Databases
 * @version 1.0.0
 */
class Join 
{
    /** @var string $type The type of join */
    private string $type;
    /** @var string $table The table to join with */
    private string $table;
    /** @var string $on1 The first column to join on */
    private string $on1;
    /** @var string $on2 The second column to join on */
    private string $on2;

    /**
     * Constructor
     * 
     * Set the specifiec join parts
     * 
     * @param string $type The type of join
     * @param string $table The table to join with
     * @param string $on1 The first column to join on
     * @param string $on1 The second column to join on
     */
    function __construct(string $type, string $table, string $on1, string $on2)
    {
        $this->type = $type;
        $this->table = $table;
        $this->on1 = $on1;
        $this->on2 = $on2;
    }

    /**
     * Get the join type
     *
     * @return string The type of join
    */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get the table
     *
     * @return string The table of the join
    */
    public function getTable(): string
    {
        return $this->table;
    }
    /**
     * Get the first part of ON
     *
     * @return string The first part of ON
    */
    public function getOn1(): string
    {
        return $this->on1;
    }
    /**
     * Get the second part of ON
     *
     * @return string The second part of ON
    */
    public function getOn2(): string
    {
        return $this->on2;
    }
}