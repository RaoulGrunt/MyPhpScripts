<?php

namespace Framework\Databases;

require_once FRAMEWORK_DATABASE_INTERFACES . '/MySqlWrapperInterface.php';
require_once FRAMEWORK_DATABASE_VALIDATORS . '/MySqlWrapperValidator.php';

use mysqli;
use Exception;

/**
 * MySqlWrapper
 *
 * A wrapper class for MySql databases
 *
 * @author Raoul de Grunt
 * @package Framework\Databases
 * @link https://www.php.net/manual/en/book.mysqli.php
 * @version 1.0.0
 */
class MySqlWrapper implements MySqlWrapperInterface
{
    /** @var MySqlWrapperValidator $validator */
    private MySqlWrapperValidator $validator;
    /** @var mysqli $connection  */
    private mysqli $connection;
    
    /**
     * Constructor.
     * 
     * Open connection to the specified database
     * 
     * @param string $server The location of the database server
     * @param string $user The user name of the database server
     * @param string $password The password of the database server
     * @param string $database The database to connect to
     */
    function __construct(string $server, string $user, string $password, string $database)
    {
        $this->setClassProperties($server, $user, $password, $database);
    }

    /**
     * Destructor
     * 
     * Close connection to the configured database
     */
    function __destruct()
    {
        $this->connection->close();
    }

    /**
     * Perform a select quest on the database
     *
     * @param MySqlSelectQuery $selectQuery The query object
     * @return string[][]
     */
    public function select(MySqlSelectQuery $selectQuery): array
    {
        $this->validator->select($selectQuery);
        return $this->performQuery($selectQuery->createSelectQuery());
    }

    /**
     * Perform the specified query
     * 
     * @param string $sql
     * @return string[][]
     */
    private function performQuery(string $sql): array
    {
        $result = $this->connection->query($sql);
        $this->validateResult($result, $sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Validate the query result
     * 
     * @param bool|\mysqli_result $queryResult The result of the query
     * @param string $sql The executed sql statement
     * @throws Exception
     */
    private function validateResult(bool|\mysqli_result $queryResult, string $sql)
    {
        if($queryResult === false) {
            throw new Exception('Query failed: ' . $sql);
        }
    }

    /**
     * Set the class properties
     * 
     * @param string $server The location of the database server
     * @param string $user The user name of the database server
     * @param string $password The password of the database server
     * @param string $database The database to connect to
     */
    private function setClassProperties(string $server, string $user, string $password, string $database)
    {
        $this->validator = new MySqlWrapperValidator();
        $this->connection = new mysqli($server, $user, $password, $database);
    }
}