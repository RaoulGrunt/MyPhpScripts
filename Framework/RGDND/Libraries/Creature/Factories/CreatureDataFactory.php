<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureBasics.php';
require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureStatistics.php';
require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureArmorClass.php';
require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureHitPoints.php';
require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureMovement.php';
require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureAbilityScores.php';
require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureAbilityModifiers.php';
require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureSkills.php';
require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureSenses.php';
require_once FRAMEWORK_RGDND_CREATURE_DATA . '/CreatureSheetOutput.php';

/**
 * CreatureDataFactory
 * 
 * Class that creates creature data objects
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureBasics 1.0.0
 * @uses CreatureStatistics 1.0.0
 * @uses CreatureArmorClass 1.0.0
 * @uses CreatureHitPoints 1.0.0
 * @uses CreatureMovement 1.0.0
 * @uses CreatureAbilityScores 1.0.0
 * @uses CreatureAbilityModifiers 1.0.0
 * @uses CreatureSkills 1.0.0
 * @uses CreatureSenses 1.0.0
 * @uses CreatureSheetOutput 1.0.0
 * @version 1.0.0
 */
class CreatureDataFactory
{
    /**
     * Create a CreatureBasics object
     * 
     * @param string[] $creatureProfile The profile to create the object from
     * @return CreatureBasics
     */
    public static function createCreatureBasics(array $creatureProfile): CreatureBasics
    {
        return new CreatureBasics($creatureProfile);
    }

    /**
     * Create a CreatureStatistics object
     * 
     * @param string[] $creatureProfile The profile to create the object from
     * @return CreatureStatistics
     */
    public static function createCreatureStatistics(array $creatureProfile): CreatureStatistics
    {
        return new CreatureStatistics($creatureProfile);
    }

    /**
     * Create a CreatureArmorClass object
     * 
     * @param string[] $creatureProfile The profile to create the object from
     * @return CreatureArmorClass
     */
    public static function createCreatureArmorClass(array $creatureProfile): CreatureArmorClass
    {
        return new CreatureArmorClass($creatureProfile);
    }

    /**
     * Create a CreatureHitPoints object
     * 
     * @param string[] $creatureProfile The profile to create the object from
     * @return CreatureHitPoints
     */
    public static function createCreatureHitPoints(array $creatureProfile): CreatureHitPoints
    {
        return new CreatureHitPoints($creatureProfile);
    }

    /**
     * Create an CreatureMovement object
     * 
     * @param string[] $creatureProfile The profile to create the object from
     * @return CreatureMovement
     */
    public static function createCreatureMovement(array $creatureProfile): CreatureMovement
    {
        return new CreatureMovement($creatureProfile);
    }

    /**
     * Create a CreatureAbilityScores object
     * 
     * @param string[] $creatureProfile The profile to create the object from
     * @return CreatureAbilityScores
     */
    public static function createCreatureAbilityScores(array $creatureProfile): CreatureAbilityScores
    {
        return new CreatureAbilityScores($creatureProfile);
    }

    /**
     * Create a CreatureAbilityModifiers object
     * 
     * @param string[] $creatureProfile The profile to create the object from
     * 
     * @return CreatureAbilityModifiers
     */
    public static function createCreatureAbilityModifiers(array $creatureProfile): CreatureAbilityModifiers
    {
        return new CreatureAbilityModifiers($creatureProfile);
    }

    /**
     * Create a CreatureSkills object
     * 
     * @param string[] $creatureProfile The profile to create the object from
     * @return CreatureSkills
     */
    public static function createCreatureSkills(array $creatureProfile): CreatureSkills
    {
        return new CreatureSkills($creatureProfile);
    }

    /**
     * Create a CreatureSenses object
     * 
     * @param string[] $creatureProfile The profile to create the object from
     * @return CreatureSenses
     */
    public static function createCreatureSenses(array $creatureProfile): CreatureSenses
    {
        return new CreatureSenses($creatureProfile);
    }

    /**
     * Create a CreatureSheetOutput object
     * 
     * @param CreatureBasics $basics The creature basics
     * @param CreatureStatistics $statistics The creature statistics
     * @param CreatureSaves $saves The creature saves
     * @param CreatureSkills $skills The creature senses
     * @param CreatureSenses $senses The creature skills
     * @return CreatureSheetOutput
     */
    public static function createCreatureSheetOutput(CreatureBasics $basics, CreatureStatistics $statistics, CreatureSaves $saves, CreatureSkills $skills, CreatureSenses $senses): CreatureSheetOutput
    {
        return new CreatureSheetOutput($basics, $statistics, $saves, $skills, $senses);
    }
}