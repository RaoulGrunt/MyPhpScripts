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
 * @version 1.0.1
 */
class Item
{
    /** @var ItemBasics $basics The basics of the item */
    protected ItemBasics $itemBasics;

    /**
     * Constructor
     * 
     * Load the specified profile
     * 
     * @param string $itemProfileFile The location of the item profile to load
     */
    public function __construct(string $itemProfileFile)
    {
        $this->loadFromProfile($itemProfileFile);
    }

    /**
     * Get the name of the item
     * 
     * @return string
     */
    public function name(): string
    {
        return $this->itemBasics->name();
    }

    /**
     * Get the description of the item
     * 
     * @return string
     */
    public function description(): string
    {
        return $this->itemBasics->description();
    }

    /**
     * Get the cost of the item
     * 
     * @return Coins
     */
    public function cost(): Coins
    {
        return $this->itemBasics->cost();
    }

    /**
     * Get the weight of the item
     * 
     * @return int
     */
    public function weight(): int
    {
        return $this->itemBasics->weight();
    }

    /**
     * Load the specified profile
     * 
     * @param string $itemProfileFile The location of the item profile to load
     */
    private function loadFromProfile(string $itemProfileFile)
    {
        $profileReader = ReaderFactory::createProfileReader($itemProfileFile);
        $itemProfile = $profileReader->profile();
        $this->itemBasics = ItemDataFactory::createItemBasics($itemProfile);
    }
}