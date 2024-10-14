<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_ITEM_DATA . '/ArmorBasics.php';

/**
 * ArmorDataFactory
 * 
 * Class that creates armor data objects
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ArmorBasics 1.0.0
 * @version 1.0.0
 */
class ArmorDataFactory
{
    /**
     * Create a ArmorBasics object
     * 
     * @param string[] $armorProfile The profile to create the object from
     * @return ArmorBasics
     */
    public static function createArmorBasics(array $armorProfile): ArmorBasics
    {
        return new ArmorBasics($armorProfile);
    }
}