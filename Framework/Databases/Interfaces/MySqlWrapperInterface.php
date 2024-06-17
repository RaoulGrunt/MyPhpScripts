<?php

namespace Framework\Databases;

/**
 * MySqlWrapperInterface
 * 
 * Interface with functions for MySqlWrapper
 *
 * @author Raoul de Grunt
 * @package Framework\Databases
 * @version 1.0.0
 */
interface MySqlWrapperInterface
{
    public function select(MySqlSelectQuery $selectQuery);
}