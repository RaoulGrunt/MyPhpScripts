<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_SHARED_BASECLASSES . '/ProfileValueUtilsBase.php';

/**
 * ArmorProfileValueUtils
 * 
 * Utils class for values loaded from an armor profile
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ProfileValueUtilsBase 1.1.0
 * @version 1.0.0
 */
class ArmorProfileValueUtils extends ProfileValueUtilsBase
{
    /**
     * Get the armor class
     * 
     * @param string[] $armorProfile The unpacked armor profile
     * @return int
     */
    public static function getArmorClass(array $armorProfile): int
    {
        return intval(self::getValue($armorProfile, 'ac'));
    }

    /**
     * Get the max added dext modifier
     * 
     * @param string[] $armorProfile The unpacked armor profile
     * @return int
     */
    public static function getMaxAddedDexMod(array $armorProfile): int
    {
        return intval(self::getValue($armorProfile, 'maxDexMod'));
    }

    /**
     * Get the strength requirement
     * 
     * @param string[] $armorProfile The unpacked armor profile
     * @return int
     */
    public static function getStrengthRequirement(array $armorProfile): int
    { 
        return intval(self::getValue($armorProfile, 'strReq'));
    }

    /**
     * Get if stealth has disadvantage
     * 
     * @param string[] $armorProfile The unpacked armor profile
     * @return bool
     */
    public static function getStealthDisadvantage(array $armorProfile): bool
    {
        return boolval(self::getValue($armorProfile, 'stealthDis'));
    }
}