<?php

/**
 * BazaarLoot
 * 
 * Data class for the loot needed for a bazaar item
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.1.0
 */
class BazaarLoot
{
    /** @var string $lootName */
    private string $lootName;
    /** @var int $amount */
    private int $amount;
    /** @var int $lootSheetRow */
    private int $lootSheetRow;
    /** @var int $bazaarSheetRow */
    private int $bazaarSheetRow;

    /**
     * Constructor
     * 
     * Set the class properties
     * 
     * @param string $lootName Name of the loot item
     * @param int $amount The amount needed to turn in
     * @param int $lootSheetRow The row number where the loot is in the sheet
     * @param int $bazaarSheetRow The row number where the bazaar item is in the sheet
     */
    public function __construct(string $lootName, int $amount, int $lootSheetRow, int $bazaarSheetRow)
    {
        $this->setClassProperties($lootName, $amount, $lootSheetRow, $bazaarSheetRow);
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
    public function lootSheetRow(): int
    {
        return $this->lootSheetRow;
    }

    /**
     * Get the bazaar row
     * 
     * @return int
     */
    public function bazaarSheetRow(): int
    {
        return $this->bazaarSheetRow;
    }

    /**
     * Set the class properties
     * 
     * @param string $lootName Name of the loot item
     * @param int $amount The amount needed to turn in
     * @param int $lootSheetRow The rownumber where the loot is in the sheet
     * @param int $bazaarSheetRow The row number where the bazaar item is in the sheet
     */
    private function setClassProperties(string $lootName, int $amount, int $lootSheetRow, int $bazaarSheetRow)
    {
        $this->lootName = $lootName;
        $this->amount = $amount;
        $this->lootSheetRow = $lootSheetRow;
        $this->bazaarSheetRow = $bazaarSheetRow;
    }
}