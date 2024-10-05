<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_SHARED_BASECLASSES . '/ProfileValueUtilsBase.php';

/**
 * ItemProfileValueUtils
 * 
 * Utils class for values loaded from an item profile
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ProfileValueUtilsBase 1.0.0
 * @version 1.1.0
 */
class ItemProfileValueUtils extends ProfileValueUtilsBase
{
    /**
     * Get the item name
     * 
     * @param string[] $itemProfile The unpacked item profile
     * @return string
     */
    public static function getName(array $itemProfile): string
    {
        return self::getValue($itemProfile, 'name');
    }

    /**
     * Get the item description
     * 
     * @param string[] $itemProfile The unpacked item profile
     * @return string
     */
    public static function getDescription(array $itemProfile): string
    {
        return self::getValue($itemProfile, 'description');
    }

    /**
     * Get the cost amount
     * 
     * @param string[] $itemProfile The unpacked item profile
     * @return int
     */
    public static function getCostAmount(array $itemProfile): int
    {
        return intval(self::getValue($itemProfile, 'costamount'));
    }

    /**
     * Get the cost coin type
     * 
     * @param string[] $itemProfile The unpacked item profile
     * @return string
     */
    public static function getCostCoinType(array $itemProfile): string
    {
        return self::getValue($itemProfile, 'costcointype');
    }

    /**
     * Get the weight
     * 
     * @param string[] $itemProfile The unpacked item profile
     * @return int
     */
    public static function getWeight(array $itemProfile): int
    {
        return intval(self::getValue($itemProfile, 'weight'));
    }
}