<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_FACTORIES . '/CreatureDataFactory.php';

/**
 * CreatureStatistics
 * 
 * A statistics of a creature
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureDataFactory 1.0.0
 * @version 1.0.0
 */
class CreatureStatistics
{
    /** @var CreatureArmorClass $armorClass The armor class of the creature */
    private CreatureArmorClass $armorClass;
    /** @var CreatureHitPoints $hitPoints The hitpoints of the creature */
    private CreatureHitPoints $hitPoints;
    /** @var CreatureMovement $movement The movement speed of the creature */
    private CreatureMovement $movement;
    /** @var CreatureAbilityScores $abilityScores The ability scores of the creature */
    private CreatureAbilityScores $abilityScores;
    /** @var CreatureAbilityModifiers $abilityModifiers The ability modifiers of the creature */
    private CreatureAbilityModifiers $abilityModifiers;

    /**
     * Constructor
     * 
     * Load the statistics from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the statistics from
     */
    public function __construct(array $creatureProfile)
    {
        $this->loadFromProfile($creatureProfile);
    }

    /**
     * Get the armor class
     * 
     * @return int
     */
    public function armorClass(): int
    {
        return $this->armorClass->armorClass();
    }

    /**
     * Get the hit points
     * 
     * @return int
     */
    public function hitPoints(): CreatureHitPoints
    {
        return $this->hitPoints;
    }

    /**
     * Get the movementSpeed
     * 
     * @return int
     */
    public function movementSpeed(): int
    {
        return $this->movement->movement();
    }

    /**
     * Get the ability scores
     * 
     * @return CreatureAbilityScores
     */
    public function abilityScores(): CreatureAbilityScores
    {
        return $this->abilityScores;
    }

    /**
     * Get the ability modifiers
     * 
     * @return CreatureAbilityModifiers
     */
    public function abilityModifiers(): CreatureAbilityModifiers
    {
        return $this->abilityModifiers;
    }

    /**
     * Load the statistics from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the statistics from
     */
    private function loadFromProfile(array $creatureProfile)
    {
        $this->armorClass = CreatureDataFactory::createCreatureArmorClass($creatureProfile);
        $this->hitPoints = CreatureDataFactory::createCreatureHitPoints($creatureProfile);
        $this->movement = CreatureDataFactory::createCreatureMovement($creatureProfile);
        $this->abilityScores = CreatureDataFactory::createCreatureAbilityScores($creatureProfile);
        $this->abilityModifiers = CreatureDataFactory::createCreatureAbilityModifiers($creatureProfile);
    }
}