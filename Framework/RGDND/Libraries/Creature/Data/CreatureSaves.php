<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_BASECLASSES . '/ModifierBasedAttributes.php';
require_once FRAMEWORK_RGDND_CREATURE_CONFIG . '/config_mappings.php';

/**
 * CreatureSaves
 * 
 * The set of modifiers for saving throws
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ModifierBasedAttributes 1.0.0
 * @version 1.0.0
 */
class CreatureSaves extends ModifierBasedAttributes
{
    /** @var string[] $saveProficiencies The saves that have proficiency */
    private array $saveProficiencies;
    /** @var int[] $saveModifiers The modifiers for each save */
    private array $saveModifiers;

    /**
     * Constructor
     * 
     * Load the saves from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the saves from
     */
    function __construct(array $creatureProfile)
    {
        $this->loadFromProfile($creatureProfile);
    }

    /**
     * Get the modifier for the specified save
     * 
     * @param string $save The save to get the modifier for
     * @return int
     */
    public function getModifierFor(string $save): int
    {
        return $this->saveModifiers[$save];
    }

    /**
     * Load the saves from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the saves from
     */
    private function loadFromProfile(array $creatureProfile)
    {
        $modifiers = $this->determineAbilityModifiers($creatureProfile);
        $proficiency = $this->getProficiency($creatureProfile);
        $this->loadSaveProficiencies($creatureProfile);
        foreach(unserialize(SAVES_ABILITY) as $save => $modifier) {
            $this->loadSave($save, $modifiers[$modifier], $proficiency);    
        }
    }

    /**
     * Load the saves the creature is proficient in
     * 
     * @param string[] $creatureProfile The profile to load the save proficiencies from
     */
    private function loadSaveProficiencies(array $creatureProfile)
    {
        $this->saveProficiencies = CreatureProfileValueUtils::getSaveProficiencies($creatureProfile);
    }

    /**
     * Load the specified save
     *
     * @param string $save The save to load 
     * @param int $abilityModifier The ability modifier for the save
     * @param int $proficiency The proficiency value
     */
    private function loadSave(string $save, int $abilityModifier, int $proficiency)
    {
        if (!in_array($save, $this->saveProficiencies)) {
            $proficiency = 0;
        }
        $this->saveModifiers[$save] = $abilityModifier + $proficiency;
    }
}