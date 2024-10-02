<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_ITEM_UTILS . '/ItemProfileValueUtils.php';

/**
 * ItemBasics
 * 
 * The basics of a item
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ItemProfileValueUtils 1.0.0
 * @version 1.0.0
 */
class ItemBasics
{
    /** @var string $name The name of the item */
    private string $name;
    /** @var string $description The description of the item */
    private string $description;

    /**
     * Constructor
     * 
     * Load the basics from the specified profile
     * 
     * @param string[] $itemProfile The profile to load the basics from
     */
    public function __construct(array $itemProfile)
    {
        $this->loadFromProfile($itemProfile);
    }

    /**
     * Get the name
     * 
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Get the description
     * 
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * Load the basics from the specified profile
     * 
     * @param string[] $itemProfile The profile to load the basics from
     */
    private function loadFromProfile(array $itemProfile)
    {
        $this->name = ItemProfileValueUtils::getName($itemProfile);
        $this->description = ItemProfileValueUtils::getDescription($itemProfile);
    }
}