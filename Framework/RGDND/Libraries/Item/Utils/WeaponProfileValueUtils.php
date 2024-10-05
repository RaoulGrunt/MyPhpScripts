<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_SHARED_BASECLASSES . '/ProfileValueUtilsBase.php';

/**
 * WeaponProfileValueUtils
 * 
 * Utils class for values loaded from an weapon profile
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ProfileValueUtilsBase 1.0.0
 * @version 1.0.0
 */
class WeaponProfileValueUtils extends ProfileValueUtilsBase
{
    /**
     * Get the damage dice
     * 
     * @param string[] $weaponProfile The unpacked weapon profile
     * @return int
     */
    public static function getDamageDice(array $weaponProfile): int
    {
        return intval(self::getValue($weaponProfile, 'dmgdice'));
    }

    /**
     * Get the times the damage dice is thrown
     * 
     * @param string[] $weaponProfile The unpacked weapon profile
     * @return int
     */
    public static function getDamageTimes(array $weaponProfile): int
    {
        return intval(self::getValue($weaponProfile, 'dmgtimes'));
    }

    /**
     * Get the damage type
     * 
     * @param string[] $weaponProfile The unpacked weapon profile
     * @return string
     */
    public static function getDamageType(array $weaponProfile): string
    {
        return self::getValue($weaponProfile, 'dmgtype');
    }
}