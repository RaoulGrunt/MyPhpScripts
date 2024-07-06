<?php

require_once FF12_BASECLASSES . '/OutputBase.php';
require_once FF12_CONVERTERS . '/BazaarValueConverter.php';

/**
 * BazaarOutput
 * 
 * Data class for the output for a bazaar item
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.0
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
        $result[] = BazaarValueConverter::convertToLootString($this->bazaarLoot);
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