<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_READERS . '/CreatureProfileReader.php';

/**
 * ReaderFactory
 * 
 * Class that creates reader objects
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureProfileReader 1.0.0
 * @version 1.0.0
 */
class ReaderFactory
{
    /**
     * Create a CreatureProfileReader object
     * 
     * @param string $creatureProfileFile The location of the profile file for the creature
     * @return CreatureProfileReader
     */
    public static function createCreatureProfileReader(string $creatureProfileFile): CreatureProfileReader
    {
        return new CreatureProfileReader($creatureProfileFile);
    }
}