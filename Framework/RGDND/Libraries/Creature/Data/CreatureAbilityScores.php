<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_UTILS . '/CreatureProfileValueUtils.php';

/**
 * AbilityScores
 * 
 * The set of ability scores that define a creatures
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureProfileValueUtils 1.0.0
 * @version 1.0.0
 */
class CreatureAbilityScores
{
    /** @var int[] $abilityScores The values for each ability */
    private array $abilityScores;

    /**
     * Constructor
     * 
     * Load the ability scores from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the ability scores from
     */
    public function __construct(array $creatureProfile)
    {
        $this->loadFromProfile($creatureProfile);
    }

    /**
     * Get the score for the specified ability
     * 
     * @param string $ability The ability to get the score for
     * @return int
     */
    public function getScoreFor(string $ability): int
    {
        return $this->abilityScores[$ability];
    }

    /**
     * Load the ability scores from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the ability socres from
     */
    function loadFromProfile(array $creatureProfile)
    {
        $this->abilityScores[ABILITY_STRENGTH] = CreatureProfileValueUtils::getStrength($creatureProfile);
        $this->abilityScores[ABILITY_DEXTERITY] = CreatureProfileValueUtils::getDexterity($creatureProfile);
        $this->abilityScores[ABILITY_CONSTITUTION] = CreatureProfileValueUtils::getConstitution($creatureProfile);
        $this->abilityScores[ABILITY_INTELLIGENCE] = CreatureProfileValueUtils::getIntelligence($creatureProfile);
        $this->abilityScores[ABILITY_WISDOM] = CreatureProfileValueUtils::getWisdom($creatureProfile);
        $this->abilityScores[ABILITY_CHARISMA] = CreatureProfileValueUtils::getCharisma($creatureProfile);
    }
}