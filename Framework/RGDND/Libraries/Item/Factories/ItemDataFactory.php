<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_ITEM_DATA . '/ItemBasics.php';

/**
 * ItemDataFactory
 * 
 * Class that creates item data objects
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ItemBasics 1.0.0
 * @version 1.0.0
 */
class ItemDataFactory
{
    /**
     * Create a ItemBasics object
     * 
     * @param string[] $itemProfile The profile to create the object from
     * @return ItemBasics
     */
    public static function createItemBasics(array $itemProfile): ItemBasics
    {
        return new ItemBasics($itemProfile);
    }
}