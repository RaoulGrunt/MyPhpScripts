<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_UTILS . '/CreatureProfileValueUtils.php';

/**
 * CreatureBasics
 * 
 * The basics of a creature
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureProfileValueUtils 1.0.0
 * @version 1.0.1
 */
class CreatureBasics
{
    /** @var string $name The name of the creature */
    private string $name;
    /** @var string $race The race of the creature */
    private string $race;
    /** @var string $allignment The alignment of the creature */
    private string $alignment;

    /**
     * Constructor
     * 
     * Load the basics from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the basics from
     */
    public function __construct(array $creatureProfile)
    {
        $this->loadFromProfile($creatureProfile);
    }

    /**
     * Get the name
     * 
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Get the race
     * 
     * @return string
     */
    public function race(): string
    {
        return $this->race;
    }

    /**
     * Get the alignment
     * 
     * @return string
     */
    public function alignment(): string
    {
        return $this->alignment;
    }

    /**
     * Load the basics from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the basics from
     */
    private function loadFromProfile(array $creatureProfile)
    {
        $this->name = CreatureProfileValueUtils::getName($creatureProfile);
        $this->race = CreatureProfileValueUtils::getRace($creatureProfile);
        $this->alignment = CreatureProfileValueUtils::getAlignment($creatureProfile);
    }
}