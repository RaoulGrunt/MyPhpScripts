<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_BASECLASSES . '/SkillModifierBasedAttributes.php';
require_once FRAMEWORK_RGDND_CREATURE_CONFIG . '/config_mappings.php';

/**
 * CreatureSkills
 * 
 * The skills of a creature
 *
 * @author Raoul de Grunt
 * @uses SkillModifierBasedAttributes 1.0.0
 * @package Framework\RGgames
 * @version 1.0.0
 */
class CreatureSkills extends SkillModifierBasedAttributes
{
    /** @var int[] $skillModifiers The modifiers for each skill */
    private array $skillModifiers;

    /**
     * Constructor
     * 
     * Load the skills from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the skills from
     */
    public function __construct(array $creatureProfile)
    {
        $this->loadFromProfile($creatureProfile);
    }

    /**
     * Get the modifier for the specified skill
     * 
     * @param string $skill The skill to get the modifier for
     * @return int
     */
    public function getModifierFor(string $skill): int
    {
        return $this->skillModifiers[$skill];
    }

    /**
     * Load the skills from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the skills from
     */
    private function loadFromProfile(array $creatureProfile)
    {
        $modifiers = $this->determineAbilityModifiers($creatureProfile);
        $proficiency = $this->getProficiency($creatureProfile);
        $this->loadSkillProficiencies($creatureProfile);
        $this->loadSkills($modifiers, $proficiency);
    }

    /**
     * Load the skills
     * 
     * @param int[] $modifiers The ability modifiers
     * @param int $proficiency The proficiency value
     */
    private function loadSkills(array $modifiers, int $proficiency)
    {
        foreach(unserialize(SKILLS_ABILITY) as $skill => $modifier) {
            $this->loadSkill($skill, $modifiers[$modifier], $proficiency);    
        }
    }

    /**
     * Load the specified skill 
     * 
     * @param string $skill The skill to load
     * @param string $abilityModifier The ability modifiers for the skill
     * @param int[] $proficiencies To which skill proficiency is applied
     * @param int $proficiency The proficiency value
     */
    private function loadSkill(string $skill, int $abilityModifier, int $proficiency)
    {
        if (!in_array($skill, $this->skillProficiencies)) {
            $proficiency = 0;
        }
        $this->skillModifiers[$skill] = $abilityModifier + $proficiency;
    }
}