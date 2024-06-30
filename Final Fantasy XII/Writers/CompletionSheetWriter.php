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
 * @version 1.0.0
 */
class CompletionSheetWriter
{
    /**
     * Write the information from the specified loot output
     * 
     * @var LootOutput[] $lootOutput The output objects to write to the loot sheet row
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