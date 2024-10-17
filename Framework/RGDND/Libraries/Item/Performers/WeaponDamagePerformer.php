<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_ITEM_DATA . '/WeaponDamage.php';
require_once FRAMEWORK_RGDND_ROOT . '/DiceRoller.php';
require_once FRAMEWORK_RGDND_SHARED_FACTORIES . '/SharedDataFactory.php';

/**
 * WeaponDamagePerformer
 * 
 * A performer class for weapon damage
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses WeaponDamage 1.1.0
 * @uses DiceRoller 1.1.0
 * @uses SharedDataFactory 1.0.0
 * @version 1.1.1
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
     * @return Damage
     */
    public function roll(): Damage
    {
        $damageAmount = DiceRoller::rollMultiple($this->damageDice(), $this->damageTimes());
        return SharedDataFactory::createDamage($damageAmount, $this->damageType());        
    }
}