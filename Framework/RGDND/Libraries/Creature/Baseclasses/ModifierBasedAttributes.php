<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_CONVERTERS . '/AbilityScoreConverter.php';
require_once FRAMEWORK_RGDND_CREATURE_UTILS . '/CreatureProfileValueUtils.php';

/**
 * ModifierBasedAttribute
 * 
 * The base class for attributes based on modifier and proficiency
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses AbilityScoreConverter 1.0.0
 * @uses CreatureProfileValueUtils 1.0.0
 * @version 1.0.0
 */
abstract class ModifierBasedAttributes
{
    /**
     * Determine the modifier for each ability
     * 
     * @param string[] $creatureProfile The profile to get the modifiers from
     * @return int[]
     */
    protected function determineAbilityModifiers(array $creatureProfile)
    {
        $modifiers = array();
        $modifiers[MODIFIER_STRENGTH] = AbilityScoreConverter::convertToModifier(CreatureProfileValueUtils::getStrength($creatureProfile));
        $modifiers[MODIFIER_DEXTERITY] = AbilityScoreConverter::convertToModifier(CreatureProfileValueUtils::getDexterity($creatureProfile));
        $modifiers[MODIFIER_CONSTITUTION] = AbilityScoreConverter::convertToModifier(CreatureProfileValueUtils::getConstitution($creatureProfile));
        $modifiers[MODIFIER_INTELLIGENCE] = AbilityScoreConverter::convertToModifier(CreatureProfileValueUtils::getIntelligence($creatureProfile));
        $modifiers[MODIFIER_WISDOM] = AbilityScoreConverter::convertToModifier(CreatureProfileValueUtils::getWisdom($creatureProfile));
        $modifiers[MODIFIER_CHARISMA] = AbilityScoreConverter::convertToModifier(CreatureProfileValueUtils::getCharisma($creatureProfile));
        return $modifiers;
    }

    /**
     * Get the proficiency bonus
     * 
     * @param string[] $creatureProfile The profile to get the proficiency from
     * @return int
     */
    protected function getProficiency(array $creatureProfile): int
    {
        return CreatureProfileValueUtils::getProficiency($creatureProfile);
    }
}