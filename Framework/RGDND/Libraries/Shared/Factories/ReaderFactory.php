<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_SHARED_READERS . '/ProfileReader.php';

/**
 * ReaderFactory
 * 
 * Class that creates reader objects
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ProfileReader 1.0.0
 * @version 1.0.0
 */
class ReaderFactory
{
    /**
     * Create a ProfileReader object
     * 
     * @param string $profileFile The location of the profile file
     * @return ProfileReader
     */
    public static function createProfileReader(string $profileFile): ProfileReader
    {
        return new ProfileReader($profileFile);
    }
}