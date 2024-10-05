<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_ITEM_DATA . '/WeaponDamage.php';
require_once FRAMEWORK_RGDND_ROOT . '/DiceRoller.php';

/**
 * WeaponDamagePerformer
 * 
 * A performer class for weapon damage
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses WeaponDamage 1.0.0
 * @uses DiceRoller 1.0.0
 * @version 1.0.0
 */
class WeaponDamagePerformer extends WeaponDamage
{
    /**
     * Constructor
     * 
     * Load the weapon damage from the specified profile
     * 
     * @param string[] $creatureProfile The profile to load the weapon damage from
     */
    public function __construct(array $creatureProfile)
    {
        parent::__construct($creatureProfile);
    }

    /**
     * Perform the damage roll
     * 
     * @return int
     */
    public function roll(): int
    {
        // ToDo: Create a damage object with amount of damage and type
        return DiceRoller::roll($this->damageDice());
    }
}