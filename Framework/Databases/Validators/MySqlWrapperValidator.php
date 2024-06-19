<?php

namespace Framework\Databases;

require_once FRAMEWORK_DATABASE_INTERFACES . '/MySqlWrapperInterface.php';

use Exception;

/**
 * MySqlWrapperValidator
 *
 * A validator class for MySqlWrapper
 *
 * @author Raoul de Grunt
 * @package Framework\Databases
 * @uses MySqlWrapperInterface 1.0.0
 * @version 1.0.1
 */
class MySqlWrapperValidator implements MySqlWrapperInterface
{
    /**
     * Perform a select quest on the database
     *
     * @param MySqlSelectQuery $selectQuery
     */
    public function select(MySqlSelectQuery $selectQuery)
    {
       if (!$selectQuery->isValid()) {
        throw new Exception('MySqlWrapper::select() - The specified query object is invalid');
       }
    }
}