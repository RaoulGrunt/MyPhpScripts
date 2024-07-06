<?php

require_once FRAMEWORK_GOOGLE_FACTORIES . '/WrapperFactory.php';

use Framework\Google as Google;

/**
 * CompletionSheetWriter
 * 
 * Class that writes to the completion sheet
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.1.0
 */
class CompletionSheetWriter
{
    /**
     * Write the information from the specified parameter to the bazaar sheet row
     * 
     * @param BazaarOutput[] $bazaarOutput The output objects to write
     */
    public function writeBazaarInformation(array $bazaarOutput)
    {
        $updateRows = array();
        foreach($bazaarOutput as $bazaarRow) {
            $updateRows[] = $bazaarRow->getUpdateRow();
        }
        Google\WrapperFactory::createSheetsWrapper()->update(COMPLETION_SHEET_ID, SHEET_BAZAAR_UPDATE_RANGE, $updateRows);     
    }

    /**
     * Write the information from the specified parameter to the loot sheet row
     * 
     * @param LootOutput[] $lootOutput The output objects to write
     */
    public function writeLootInformation(array $lootOutput)
    {
        $updateRows = array();
        foreach($lootOutput as $lootRow) {
            $updateRows[] = $lootRow->getUpdateRow();
        }
        Google\WrapperFactory::createSheetsWrapper()->update(COMPLETION_SHEET_ID, SHEET_LOOT_UPDATE_RANGE, $updateRows);     
    }
}