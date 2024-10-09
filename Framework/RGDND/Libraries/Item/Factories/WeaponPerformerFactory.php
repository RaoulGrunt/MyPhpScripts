<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_ITEM_PERFORMERS . '/WeaponDamagePerformer.php';

/**
 * WeaponPeformerFactory
 * 
 * Class that creates weapon data objects
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses WeaponDamagePerformer 1.1.0
 * @version 1.0.1
 */
class WeaponPeformerFactory
{
    /**
     * Create a WeaponPerformer object
     * 
     * @param string[] $weaponProfile The profile to create the object from
     * @return WeaponDamagePerformer
     */
    public static function createWeaponDamagePerformer(array $weaponProfile): WeaponDamagePerformer
    {
        return new WeaponDamagePerformer($weaponProfile);
    }
}