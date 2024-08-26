<?php

require_once SCRIPT_BASECLASSES . '/OutputBase.php';
require_once SCRIPT_CONVERTERS . '/LootNeededValueConverter.php';

/**
 * BazaarOutput
 * 
 * Data class for the output for a bazaar item
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses OutputBase 1.0.0
 * @uses LootNeededValueConverter 1.0.0
 * @version 1.0.2
 */
class BazaarOutput extends OutputBase
{
    /** @var BazaarLoot[] $bazaarLoot The bazaar loot that needs to be output */
    private array $bazaarLoot;

    /**
     * Constructor
     * 
     * Set the class properties
     * 
     * @param BazaarLoot[] $bazaarLoot
     */
    public function __construct(array $bazaarLoot)
    {
        $this->setClassProperties($bazaarLoot);
    }

    /**
     * Get the row values to write in the sheet
     * 
     * @return string
     */
    public function getUpdateRow(): array
    {
        $result = array();
        $result[] = LootNeededValueConverter::convertToLootString($this->bazaarLoot);
        return $result;
    }

   /**
     * Set the class propeties
     * 
     * @param BazaarLoot[] $bazaarLoot
     */
    private function setClassProperties(array $bazaarLoot)
    {
        $this->bazaarLoot = $bazaarLoot;
    } 
}