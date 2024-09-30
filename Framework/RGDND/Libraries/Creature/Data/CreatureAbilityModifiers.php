<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_BASECLASSES . '/ModifierBasedAttributes.php';

/**
 * AbilityModifiers
 * 
 * The set of ability modifiers for a creature
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ModifierBasedAttributes 1.0.0
 * @version 1.0.0
 */
class CreatureAbilityModifiers extends ModifierBasedAttributes
{
    /** @var int[] $abilityModifiers The values for each ability modifier */
    private array $abilityModifiers;

    /**
     * Constructor
     * 
     * Load the ability scores from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the ability modifiers from
     */
    function __construct(array $creatureProfile)
    {
        $this->loadFromProfile($creatureProfile);
    }

    /**
     * Get the score for the specified ability
     * 
     * @param string $ability The ability to get the score for
     * @return int
     */
    public function getScoreFor(string $abilityModifier): int
    {
        return $this->abilityModifiers[$abilityModifier];
    }

    /**
     * Load the ability modifiers from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the ability modifiers from
     */
    function loadFromProfile(array $creatureProfile)
    {
        $this->abilityModifiers = $this->determineAbilityModifiers($creatureProfile);
    }
}