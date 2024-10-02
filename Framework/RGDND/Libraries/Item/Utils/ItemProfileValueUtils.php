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
 * @version 1.0.0
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
}