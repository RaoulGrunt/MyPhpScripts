<?php

require_once SCRIPT_BASECLASSES . '/OutputBase.php';
require_once SCRIPT_CONVERTERS . '/SellUpToValueConverter.php';
require_once SCRIPT_CONVERTERS . '/NeededToTurnInValueConverter.php';

/**
 * LootOutput
 * 
 * Data class for the output for a piece of loot
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses OutputBase 1.0.0
 * @uses SellUpToValueConverter 1.0.0
 * @uses NeededToTurnInValueConverter 1.0.0
 * @version 1.3.1
 */
class LootOutput extends OutputBase
{
    /** @var string $lootName */
    private string $lootName;
    /** @var BazaarLoot[][] $bazaarLoot */
    private array $bazaarLoot;

    /**
     * Constructor
     * 
     * Set the class properties
     * 
     * @param string $lootName Name of the loot item
     */
    public function __construct(string $lootName)
    {
        $this->setClassProperties($lootName);
    }

    /**
     * Add bazaar loot database result
     * 
     * @param BazaarLoot[] $bazaarLoot
     * @param string $lootName
     */
    public function addBazaarLoot(array $bazaarLoot, string $lootName)
    {
        $result = array();
        foreach($bazaarLoot as $bazaarLootItem) {
            if ($bazaarLootItem->lootName() === $lootName) {
                array_unshift($result, $bazaarLootItem);
            } else {
                $result[] = $bazaarLootItem;
            }
        }
        $this->bazaarLoot[] = $result;
    }

    /**
     * Get the row values to write in the sheet
     * 
     * @return string[]
     */
    public function getUpdateRow(): array
    {
        $result = array();
        $result[] = SellUpToValueConverter::convertToSellUpToString($this->bazaarLoot);
        foreach($this->bazaarLoot as $bazaarItemLoot) {
            $result[] = NeededToTurnInValueConverter::convertToNeededToTurnInString($bazaarItemLoot);
        }
        return $result;
    }

    /**
     * Set the class proerties
     * 
     * @param string lootName The name of the loot item
     */
    private function setClassProperties(string $lootName)
    {
        $this->lootName = $lootName;
        $this->bazaarLoot = array();
    }
}