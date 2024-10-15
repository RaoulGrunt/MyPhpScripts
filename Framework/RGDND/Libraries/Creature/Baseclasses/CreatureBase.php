<?php

namespace Framework\RGDND;

require_once(FRAMEWORK_RGDND_SHARED_FACTORIES . '/ReaderFactory.php');
require_once(FRAMEWORK_RGDND_CREATURE_FACTORIES . '/CreatureDataFactory.php');
require_once(FRAMEWORK_RGDND_CREATURE_FACTORIES . '/PerformerFactory.php');

/**
 * CreatureBase
 * 
 * A creature in the world
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ReaderFactory 1.0.0
 * @uses CreatureDataFactory 1.0.0
 * @uses PerformerFactory 1.0.0
 * @version 1.1.0
 */
abstract class CreatureBase
{
    /** @var CreatureBasics $basics The basic of the creature */
    protected CreatureBasics $basics;
    /** @var CreatureStatistics $statistics The statistics of the creature */
    protected CreatureStatistics $statistics;
    /** @var CreatureSavePerformer $saves The saves of the creature */
    protected CreatureSavePerformer $saves;
    /** @var CreatureSkillPerformer $skills The skills of the creature */
    protected CreatureSkillPerformer $skills;
    /** @var CreatureSenses $senses The senses of the creature */
    protected CreatureSenses $senses;

    /**
     * Constructor
     * 
     * Load the specified profile for the character
     * 
     * @param string $creatureProfileFile The location of the creature profile to load
     */
    public function __construct(string $creatureProfileFile)
    {
        $this->loadFromProfile($creatureProfileFile);
    }

    /**
     * Get the name
     * 
     * @return string
     */
    public function name(): string
    {
        return $this->basics->name();
    }

    /**
     * Get the score of specified sense
     * 
     * @param string $sense The sense to get score for
     * @return int
     */
    public function getSenseScore(string $sense): int
    {
        return $this->senses->getValueFor($sense);
    }

    /**
     * Perform the specified save
     * 
     * @param string $save The save to perform
     * @param int $dc The difficulty class
     * @return int
     */
    public function performSave(string $save, int $dc): bool
    {
        return $this->saves->perform($save, $dc);
    }

    /**
     * Perform the specified skill
     * 
     * @param string $skill The skill to perform
     * @param int $dc The difficulty class
     * @return bool Wether the skill suceeded
     */
    public function performSkill(string $skill, int $dc): bool
    {
        return $this->skills->perform($skill, $dc);
    }

    /**
     * Roll for initiative
     * 
     * @return int
     */
    public function rollInitiative(): int
    {
        return DiceRoller::roll(D20) + $this->statistics->abilityModifiers()->getScoreFor(MODIFIER_DEXTERITY);
    }

    /**
     * Load the specified profile
     * 
     * @param string $creatureProfileFile The location of the creature profile to load
     */
    private function loadFromProfile(string $creatureProfileFile)
    {
        $profileReader = ReaderFactory::createProfileReader($creatureProfileFile);
        $creatureProfile = $profileReader->profile();
        $this->basics = CreatureDataFactory::createCreatureBasics($creatureProfile);
        $this->statistics = CreatureDataFactory::createCreatureStatistics($creatureProfile);
        $this->saves = PerformerFactory::createCreatureSavePerformer($creatureProfile);
        $this->skills = PerformerFactory::createCreatureSkillPerformer($creatureProfile);
        $this->senses = CreatureDataFactory::createCreatureSenses($creatureProfile);
    }
}