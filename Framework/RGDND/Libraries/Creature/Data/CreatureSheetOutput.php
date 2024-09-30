<?php

namespace Framework\RGDND;

/**
 * CreatureSheetOutput
 * 
 * Class that contains sheet output for a creature
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @version 1.0.0
 */
class CreatureSheetOutput
{
    /** @var CreatureBasics $basics */
    private CreatureBasics $basics;
    /** @var CreatureStatistics $statistics */
    private CreatureStatistics $statistics;
    /** @var CreatureSaves $saves */
    private CreatureSaves $saves;
    /** @var CreatureSkills $skills */
    private CreatureSkills $skills;
    /** @var CreatureSenses $senses */
    private CreatureSenses $senses;

    /**
     * Constructor
     * 
     * Set the class properties
     * 
     * @param CreatureBasics $basics The creature basics
     * @param CreatureStatistics $statistics The creature statistics
     * @param CreatureSaves $saves The creature saves
     * @param CreatureSenses $senses The creature senses
     * @param CreatureSkills $skills The creature skills
     */
    public function __construct(CreatureBasics $basics, CreatureStatistics $statistics, CreatureSaves $saves, CreatureSkills $skills, CreatureSenses $senses)
    {
        $this->setClassProperties($basics, $statistics, $saves, $skills, $senses);
    }

    /**
     * Get the creature basics
     * 
     * @return CreatureBasics
     */
    public function basics(): CreatureBasics
    {
        return $this->basics;
    }

    /**
     * Get the creature statistics
     * 
     * @return CreatureStatistics
     */
    public function statistics(): CreatureStatistics
    {
        return $this->statistics;
    }

    /**
     * Get the creature saves
     * 
     * @return CreatureSaves
     */
    public function saves(): CreatureSaves
    {
        return $this->saves;
    }

    /**
     * Get the creature basics
     * 
     * @return CreatureSenses
     */
    public function senses(): CreatureSenses
    {
        return $this->senses;
    }

    /**
     * Get the creature skills
     * 
     * @return CreatureSkills
     */
    public function skills(): CreatureSkills
    {
        return $this->skills;
    }

    /**
     * Set the class properties
     * 
     * @param CreatureBasics $basics The creature basics
     * @param CreatureStatistics $statistics The creature statistics
     * @param CreatureSaves $saves The creature saves
     * @param CreatureSenses $senses The creature senses
     * @param CreatureSkills $skills The creature skills
     */
    private function setClassProperties(CreatureBasics $basics, CreatureStatistics $statistics, CreatureSaves $saves, CreatureSkills $skills, CreatureSenses $senses)
    {
        $this->basics = $basics;
        $this->statistics = $statistics;
        $this->saves = $saves;
        $this->senses = $senses;
        $this->skills = $skills;
    }
}