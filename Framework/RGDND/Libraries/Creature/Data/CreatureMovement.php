<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_UTILS . '/CreatureProfileValueUtils.php';

/**
 * CreatureMovement
 * 
 * The movement of a creature
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureProfileValueUtils 1.0.0
 * @version 1.0.0
 */
class CreatureMovement
{
    /** @var int $movement The movement distance */
    private int $movement;

    /**
     * Constructor
     * 
     * Load the movement from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the movement from
     */
    function __construct(array $creatureProfile)
    {
        $this->loadFromProfile($creatureProfile);
    }

    /**
     * Get the movement distance
     * 
     * @return int
     */
    public function movement()
    {
        return $this->movement;
    }

    /**
     * Load the movement from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the movement from
     */
    private function loadFromProfile(array $creatureProfile)
    {
        $this->movement = CreatureProfileValueUtils::getMovement($creatureProfile);
    }
}