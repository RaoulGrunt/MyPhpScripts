<?php

require_once SCRIPT_BASECLASSES . '/OutputBase.php';
require_once SCRIPT_CONVERTERS . '/LootValueConverter.php';

/**
 * LootOutput
 * 
 * Data class for the output for a piece of loot
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses OutputBase 1.0.0
 * @uses LootValueConverter 1.0.0
 * @version 1.2.0
 */
class LootOutput extends OutputBase
{
    /** @var string $lootName */
    private string $lootName;
    /** @var int $sellUpTo */
    private int $sellUpTo;
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
                $this->sellUpTo += $bazaarLootItem->amount();
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
        $result[] = LootValueConverter::convertToSellUpToString($this->getCurrentLootRow(), $this->sellUpTo);
        foreach($this->bazaarLoot as $bazaarItemLoot) {
            $result[] = LootValueConverter::convertToNeededToTurnInString($bazaarItemLoot);
        }
        return $result;
    }

    /**
     * Get the sheet function for Sell up to cell
     * 
     * @return string
     */
    public function getSellUpToSheetText(): string
    {
        $result = '1';
        $lootRow = $this->getCurrentLootRow();
        if ($lootRow > 0) {
                $result = '=IF(B' . $lootRow . ',1, ' . $this->sellUpTo . ')';
        }
        return $result;
    }

    /**
     * Get the row of the current loot
     * 
     * @return int
     */
    private function getCurrentLootRow(): int
    {
        $result = '0';
        if (!empty($this->bazaarLoot)) {
            $result = $this->bazaarLoot[0][0]->sheetRow();
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
        $this->sellUpTo = 1;
        $this->bazaarLoot = array();
    }
}