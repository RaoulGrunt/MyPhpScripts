<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureSkills.php';
require_once FRAMEWORK_RGDND_ROOT . '/DiceRoller.php';
require_once FRAMEWORK_RGDND_CREATURE_PRINTERS . '/CheckPrinter.php';

/**
 * CreatureSkillPerformer
 * 
 * A performer class for creature actions
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureSkills 1.0.0
 * @uses DiceRoller 1.0.0
 * @uses CheckPrinter 1.0.0
 * @version 1.0.0
 */
class CreatureSkillPerformer extends CreatureSkills
{
    /**
     * Constructor
     * 
     * Load the skills from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the skills from
     */
    public function __construct(array $creatureProfile)
    {
        parent::__construct($creatureProfile);
    }

    /**
     * Perform the specified skill
     * 
     * @param string $skill The skill to perform
     * @param int $dc The difficulty class for the skill
     * @return bool
     */
    public function perform(string $skill, int $dc): bool
    {
        $checkValue = DiceRoller::roll(D20) + $this->getModifierFor($skill);
        $result = $checkValue >= $dc;
        CheckPrinter::printSkillCheck($skill, $checkValue, $dc, $result);
        return $result;
    }
}