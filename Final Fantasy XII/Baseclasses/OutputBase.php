<?php

/**
 * OutputBase
 * 
 * Base class for output classes
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.1
 */
abstract class OutputBase
{
    /**
     * Abstract function to get row values to write in the sheet
     * 
     * @return string[]
     */
    abstract public function getUpdateRow(): array;
}