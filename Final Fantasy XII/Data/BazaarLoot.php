<?php

/**
 * BazaarLoot
 * 
 * Data class for the loot needed for a bazaar item
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.1
 */
class BazaarLoot
{
    /** @var string $lootName */
    private string $lootName;
    /** @var int $amount */
    private int $amount;
    /** @var int $sheetRow */
    private int $sheetRow;

    /**
     * Constructor
     * 
     * Set the class properties
     * 
     * @param string $lootName Name of the loot item
     * @param int $amount The amount needed to turn in
     * @param int $sheetRow The row number where the loot is in the sheet
     */
    public function __construct(string $lootName, int $amount, int $sheetRow)
    {
        $this->setClassProperties($lootName, $amount, $sheetRow);
    }

    /**
     * Get the loot name
     * 
     * @return string
     */
    public function lootName(): string
    {
        return $this->lootName;
    }

    /**
     * Get the amount
     * 
     * @return int
     */
    public function amount(): int
    {
        return $this->amount;
    }

    /**
     * Get the sheet row
     * 
     * @return int
     */
    public function sheetRow(): int
    {
        return $this->sheetRow;
    }

    /**
     * Set the class properties
     * 
     * @param string $lootName Name of the loot item
     * @param int $amount The amount needed to turn in
     * @param int $sheetRow The rownumber where the loot is in the sheet
     */
    private function setClassProperties(string $lootName, int $amount, int $sheetRow)
    {
        $this->lootName = $lootName;
        $this->amount = $amount;
        $this->sheetRow = $sheetRow;
    }
}