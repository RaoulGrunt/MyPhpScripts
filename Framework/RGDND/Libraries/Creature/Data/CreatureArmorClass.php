<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_UTILS . '/CreatureProfileValueUtils.php';

/**
 * ArmorClass
 * 
 * The armor class of a creature
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureProfileValueUtils 1.0.0
 * @version 1.0.0
 */
class CreatureArmorClass
{
    /** @var int $armorClass The armor class */
    private int $armorClass;

    /**
     * Constructor
     * 
     * Load the armor class from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the armor class from
     */
    function __construct(array $creatureProfile)
    {
        $this->loadFromProfile($creatureProfile);
    }

    /**
     * Get the armor class value
     * 
     * @return int
     */
    public function armorClass()
    {
        return $this->armorClass;
    }

    /**
     * Load the armor class from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the armor class from
     */
    function loadFromProfile(array $creatureProfile)
    {
        $this->armorClass = CreatureProfileValueUtils::getArmorClass($creatureProfile);
    }
}