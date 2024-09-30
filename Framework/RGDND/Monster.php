<?php

namespace Framework\RGDND;

require_once(FRAMEWORK_RGDND_LIBRARY_CREATURE_CONFIG);
require_once(FRAMEWORK_RGDND_CREATURE_BASECLASSES . '/CreatureBase.php');
require_once(FRAMEWORK_RGDND_CREATURE_FACTORIES . '/CreatureDataFactory.php');
require_once(FRAMEWORK_RGDND_CREATURE_PRINTERS . '/MonsterSheetPrinter.php');

/**
 * Monster
 * 
 * A monster in the world
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureBase 1.0.0
 * @uses CreatureDataFactory 1.0.0
 * @uses MonsterSheetPrinter 1.0.0
 * @version 1.0.0
 */
class Monster extends CreatureBase
{
   /**
     * Constructor
     * 
     * Load the specified profile for the character
     * 
     * @param string $creatureProfile
     */
    public function __construct(string $creatureProfile)
    {
        parent::__construct($creatureProfile);
    }

    /**
     * Print the creature data as monster sheet
     */
    public function printMonsterSheet()
    {
        $sheetOutput = CreatureDataFactory::createCreatureSheetOutput($this->basics, $this->statistics, $this->saves, $this->skills, $this->senses);
        MonsterSheetPrinter::print($sheetOutput);
    }
}