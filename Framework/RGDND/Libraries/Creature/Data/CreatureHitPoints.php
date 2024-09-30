<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_UTILS . '/CreatureProfileValueUtils.php';

/**
 * HitPoints
 * 
 * The hit points of a creature
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureProfileValueUtils 1.0.0
 * @version 1.0.0
 */
class CreatureHitPoints
{
    /** @var int $maxHitpoints The maximum hit points of the creature */
    private int $maxHitpoints;
    /** @var int $currentHitpoints The current hit points of the creature */
    private int $currentHitpoints;

    /**
     * Constructor
     * 
     * Load the hit points from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the hit points from
     */
    public function __construct(array $creatureProfile)
    {
        $this->loadFromProfile($creatureProfile);
    }

    /**
     * Get the maximum hit points of the creature
     * 
     * @return int
     */
    public function maxHitpoints(): int
    {
        return $this->maxHitpoints;
    }

    /**
     * Get the current hit points of the creature
     * 
     * @return int
     */
    public function currentHitpoints(): int
    {
        return $this->currentHitpoints;
    }

    /**
     * Load the hit points from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the hit points from
     */
    private function loadFromProfile(array $creatureProfile)
    {
        $this->maxHitpoints = CreatureProfileValueUtils::getMaxHP($creatureProfile);
        $this->currentHitpoints = CreatureProfileValueUtils::getCurrentHP($creatureProfile);
    }
}