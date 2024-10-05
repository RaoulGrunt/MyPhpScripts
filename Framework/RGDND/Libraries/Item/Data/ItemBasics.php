<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_ITEM_UTILS . '/ItemProfileValueUtils.php';
require_once FRAMEWORK_RGDND_ITEM_FACTORIES . '/ItemDataFactory.php';

/**
 * ItemBasics
 * 
 * The basics of a item
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ItemProfileValueUtils 1.1.0
 * @version 1.1.0
 */
class ItemBasics
{
    /** @var string $name The name of the item */
    private string $name;
    /** @var string $description The description of the item */
    private string $description;
    /** @var Coins $cost The normal cost of the item */
    private Coins $cost;
    /** @var int $weight The weight of the item */
    private int $weight;

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
     * Get the cost
     * 
     * @return Coins
     */
    public function cost(): Coins
    {
        return $this->cost;
    }

    /**
     * Get the weight
     * 
     * @return int
     */
    public function weight(): int
    {
        return $this->weight;
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
        $costAmount = ItemProfileValueUtils::getCostAmount($itemProfile);
        $costCoinType = ItemProfileValueUtils::getCostCoinType($itemProfile);
        $this->cost = ItemDataFactory::createCoins($costAmount, $costCoinType);
        $this->weight = ItemProfileValueUtils::getWeight($itemProfile);
    }
}