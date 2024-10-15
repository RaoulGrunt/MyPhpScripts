<?php

namespace Framework\RGDND;

require_once(FRAMEWORK_RGDND_LIBRARY_CREATURE_CONFIG);
require_once(FRAMEWORK_RGDND_CREATURE_BASECLASSES . '/CreatureBase.php');
require_once(FRAMEWORK_RGDND_CREATURE_FACTORIES . '/CreatureDataFactory.php');
require_once(FRAMEWORK_RGDND_CREATURE_PRINTERS . '/CharacterSheetPrinter.php');

/**
 * Character
 * 
 * A character, PC or NPC, in the world
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureBase 1.1.0
 * @uses CreatureDataFactory 1.0.0
 * @uses CharacterSheetPrinter 1.0.0
 * @version 1.0.1
 */
class Character extends CreatureBase
{
    /**
     * Constructor
     * 
     * Load the specified profile for the character
     * 
     * @param string $characterProfileFile The location of the creature profile to load
     */
    public function __construct(string $characterProfileFile)
    {
        parent::__construct($characterProfileFile);
    }

    /**
     * Print the creature data as character sheetC
     */
    public function printCharacterSheet()
    {
        $sheetOutput = CreatureDataFactory::createCreatureSheetOutput($this->basics, $this->statistics, $this->saves, $this->skills, $this->senses);
        CharacterSheetPrinter::print($sheetOutput);
    }
}