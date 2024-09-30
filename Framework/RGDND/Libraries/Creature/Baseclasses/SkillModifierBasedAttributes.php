<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_BASECLASSES . '/ModifierBasedAttributes.php';

/**
 * ModifierBasedAttribute
 * 
 * The base class for skill based attributes based on modifier and proficiency
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ModifierBasedAttributes 1.0.0
 * @uses CreatureProfileValueUtils 1.0.0
 * @version 1.0.0
 */
abstract class SkillModifierBasedAttributes extends ModifierBasedAttributes
{
    /** @var string[] $skillProficiencies The skills that have proficiency */
    protected array $skillProficiencies;

    /**
     * Load the skills the creature is proficient in
     * 
     * @param string[] $creatureProfile The profile to load the skill proficiencies from
     */
    protected function loadSkillProficiencies(array $creatureProfile)
    {
        $this->skillProficiencies = CreatureProfileValueUtils::getSkillProficiencies($creatureProfile);
    }
}