<?php

namespace Framework\RGDND;

require_once(FRAMEWORK_RGDND_SHARED_FACTORIES . '/ReaderFactory.php');
require_once(FRAMEWORK_RGDND_ITEM_FACTORIES . '/ItemDataFactory.php');

/**
 * Item
 * 
 * The base class for an item
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ReaderFactory 1.0.0
 * @uses ItemDataFactory 1.0.0
 * @version 1.0.0
 */
abstract class ItemBase
{
    /** @var ItemBasics $basics The basic of the item */
    protected ItemBasics $basics;

    public function __construct(string $itemProfileFile)
    {
        $this->loadProfile($itemProfileFile);
    }

    /**
     * Load the specified profile
     * 
     * @param string $itemProfileFile The location of the item profile to load
     */
    private function loadProfile(string $itemProfileFile)
    {
        $profileReader = ReaderFactory::createProfileReader($itemProfileFile);
        $itemProfile = $profileReader->profile();
        $this->basics = ItemDataFactory::createItemBasics($itemProfile);
    }
}