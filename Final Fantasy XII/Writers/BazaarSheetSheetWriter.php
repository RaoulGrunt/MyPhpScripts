<?php

require_once SCRIPT_BASECLASSES . '/SheetWriterBase.php';

/**
 * BazaarSheetSheetWriter
 * 
 * Class that writes to the bazaar sheet
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses SheetWriterBase 1.0.0
 * @version 1.0.0
 */
class BazaarSheetSheetWriter extends SheetWriterBase
{
    /**
     * Write the information from the specified parameter to the bazaar sheet row
     * 
     * @param BazaarOutput[] $bazaarOutput The output objects to write
     */
    public function writeBazaarInformation(array $bazaarOutput)
    {
        // ToDo: Empty the entire range 
        $this->writeInformation(SHEET_BAZAAR_UPDATE_RANGE, $bazaarOutput);   
    }
}