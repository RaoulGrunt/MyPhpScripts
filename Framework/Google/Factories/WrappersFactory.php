<?php

namespace Framework\Google;

require_once FRAMEWORK_GOOGLE_WRAPPERS . '/SheetsWrapper.php';

/**
 * WrapperFactory
 * 
 * Class that creates Google Wrapper objects 
 * 
 * @author Raoul de Grunt
 * @package Framework\Google
 * @version 1.0.0
 */
class WrapperFactory
{
    /**
     * Create a SheetsWrapper object
     * 
     * @return SheetsWrapper
     */
    public static function createSheetsWrapper(): SheetsWrapper
    {
        return new SheetsWrapper();
    }
}