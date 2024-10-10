<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_ITEM_DATA . '/WeaponBasics.php';

/**
 * WeaponDataFactory
 * 
 * Class that creates weapon data objects
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses WeaponBasics 1.1.0
 * @version 1.0.0
 */
class WeaponDataFactory
{
    /**
     * Create a WeaponBasics object
     * 
     * @param string[] $weaponProfile The profile to create the object from
     * @return WeaponBasics
     */
    public static function createWeaponBasics(array $weaponProfile): WeaponBasics
    {
        return new WeaponBasics($weaponProfile);
    }
}