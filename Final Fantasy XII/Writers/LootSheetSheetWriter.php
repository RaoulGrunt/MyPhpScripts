<?php

require_once SCRIPT_BASECLASSES . '/SheetWriterBase.php';

/**
 * LootSheetSheetWriter
 * 
 * Class that writes to the loot sheet
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses SheetWriterBase 1.1.0
 * @version 1.0.1
 */
class LootSheetSheetWriter extends SheetWriterBase
{
    /**
     * Write the information from the specified parameter to the loot sheet row
     * 
     * @param LootOutput[] $lootOutput The output objects to write
     */
    public function writeLootInformation(array $lootOutput)
    {
        $this->clearRange(SHEET_LOOT_UPDATE_RANGE);
        $this->writeInformation(SHEET_LOOT_UPDATE_RANGE, $lootOutput);
    }
}