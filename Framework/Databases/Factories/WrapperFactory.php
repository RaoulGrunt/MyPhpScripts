<?php

namespace Framework\Databases;

require_once FRAMEWORK_DATABASE_WRAPPERS . '/MySqlWrapper.php';

/**
 * WrapperFactory
 * 
 * Class that creates database wrapper objects
 * 
 * @author Raoul de Grunt
 * @package Framework\Databases
 * @uses MySqlWrapper 1.0.0
 * @version 1.0.1
 */
class WrapperFactory
{
    /**
     * Create a MySqlWrapper object
     * 
     * @param string $server The location of the database server
     * @param string $user The user name of the database server
     * @param string $password The password of the database server
     * @param string $database The database to connect to
     * @return MySqlWrapper
     */
    public static function createMySqlWrapper(string $server, string $user, string $password, string $database): MySqlWrapper
    {
        return new MySqlWrapper($server, $user, $password, $database);
    }
}