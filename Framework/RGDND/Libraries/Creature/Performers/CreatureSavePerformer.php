<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureSaves.php';
require_once FRAMEWORK_RGDND_ROOT . '/DiceRoller.php';
require_once FRAMEWORK_RGDND_CREATURE_PRINTERS . '/CheckPrinter.php';

/**
 * CreatureSavePerformer
 * 
 * A performer class for creature saves
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureSaves 1.0.0
 * @uses DiceRoller 1.0.0
 * @uses CheckPrinter 1.0.0
 * @version 1.0.1
 */
class CreatureSavePerformer extends CreatureSaves
{
    /**
     * Constructor
     * 
     * Load the saves from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the saves from
     */
    public function __construct(array $creatureProfile)
    {
        parent::__construct($creatureProfile);
    }

    /**
     * Perform the specified save
     * 
     * @param string $save The save to perform
     * @var int $dc The difficulty class for the save
     * @return bool
     */
    public function perform(string $save, int $dc): bool
    {
        $checkValue = DiceRoller::roll(D20) + $this->getModifierFor($save);
        $result = $checkValue >= $dc;
        CheckPrinter::printSaveCheck($save, $checkValue, $dc, $result);
        return $result;
    }
}