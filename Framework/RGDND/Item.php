<?php

namespace Framework\RGDND;

require_once(FRAMEWORK_RGDND_LIBRARY_ITEM_CONFIG);
require_once(FRAMEWORK_RGDND_SHARED_FACTORIES . '/ReaderFactory.php');
require_once(FRAMEWORK_RGDND_ITEM_FACTORIES . '/ItemDataFactory.php');

/**
 * Item
 * 
 * The class for an item
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ReaderFactory 1.0.0
 * @uses ItemDataFactory 1.1.0
 * @version 1.0.0
 */
class Item
{
    /** @var ItemBasics $basics The basic of the item */
    protected ItemBasics $basics;

    /**
     * Constructor
     * 
     * Load the specified profile
     * 
     * @param string $itemProfileFile The location of the item profile to load
     */
    public function __construct(string $itemProfileFile)
    {
        $this->loadProfile($itemProfileFile);
    }

    /**
     * Get the name of the item
     * 
     * @return string
     */
    public function name(): string
    {
        return $this->basics->name();
    }

    /**
     * Get the description of the item
     * 
     * @return string
     */
    public function description(): string
    {
        return $this->basics->description();
    }

    /**
     * Get the cost of the item
     * 
     * @return Coins
     */
    public function cost(): Coins
    {
        return $this->basics->cost();
    }

    /**
     * Get the weight of the item
     * 
     * @return int
     */
    public function weight(): int
    {
        return $this->basics->weight();
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