<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_BASECLASSES . '/SkillModifierBasedAttributes.php';
require_once FRAMEWORK_RGDND_CREATURE_CONFIG . '/config_mappings.php';

/**
 * CreatureSenses
 * 
 * The senses of a creature
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses SkillModifierBasedAttributes 1.0.0
 * @version 1.0.0
 */
class CreatureSenses extends SkillModifierBasedAttributes
{
    /** @var int[] $senses The values for each sense */
    private array $senses;

    /**
     * Constructor
     * 
     * Load the senses from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the senses from
     */
    public function __construct(array $creatureProfile)
    {
        $this->loadFromProfile($creatureProfile);
    }

    /**
     * Get the value for the specified sense
     * 
     * @param string $sense The sense to get the value for
     * @return int
     */
    public function getValueFor(string $sense): int
    {
        return $this->senses[$sense];
    }

    /**
     * Load the senses from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the senses from
     */
    private function loadFromProfile(array $creatureProfile)
    {
        $modifiers = $this->determineAbilityModifiers($creatureProfile);
        $proficiency = $this->getProficiency($creatureProfile);
        $this->loadSkillProficiencies($creatureProfile);
        $this->loadSenses($modifiers, $proficiency);
    }

    /**
     * Load the senses
     * 
     * @param array $modifiers The modifier that apply to each save
     * @param int $proficiency The proficiency score
     */
    private function loadSenses(array $modifiers, int $proficiency)
    {
        foreach(unserialize(SENSES_ABILITY) as $sense => $modifier) {
            $this->loadSense($sense, $modifiers[$modifier], $proficiency);
        }
    }

    /**
     * Load the specified sense
     * 
     * @param string $sense The sense to load
     * @param int $abilityModifier The ability modifier value for this sense
     * @param int $proficiency The proficiency score
     */
    private function loadSense(string $sense, int $abilityModifier, int $proficiency)
    {
        if (!in_array($sense, $this->skillProficiencies)) {
            $proficiency = 0;
        }
        $this->senses[$sense] = 10 + $abilityModifier + $proficiency;
    }
}