<?php

require_once SCRIPT_BASECLASSES . '/SheetReaderBase.php';

/**
 * LootSheetSheetReader
 * 
 * Class that reads information from the Loot sheet
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses SheetReaderBase 1.0.0
 * @version 1.0.0
 */
class LootSheetSheetReader extends SheetReaderBase
{
    /**
     * Get the values from the loot sheet defined in the config
     * 
     * @return string[]
     */
    public function getLootNames(): array
    {
        return $this->getSingleColumnRangeValues(SHEET_LOOT_NAME_RANGE);
    }
}