<?php

require_once SCRIPT_BASECLASSES . '/SheetReaderBase.php';

/**
 * BazaarSheetSheetReader
 * 
 * Class that reads information from the Bazaar sheet
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses SheetReaderBase 1.0.0
 * @version 1.0.0
 */
class BazaarSheetSheetReader extends SheetReaderBase
{
    /**
     * Get the values from the bazaar sheet defined in the config
     * 
     * @return string[]
     */
    public function getBazaarNames(): array
    {
        return $this->getSingleColumnRangeValues(SHEET_BAZAAR_NAME_RANGE);
    }
}