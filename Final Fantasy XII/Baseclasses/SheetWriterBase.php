<?php

require_once FRAMEWORK_GOOGLE_FACTORIES . '/WrapperFactory.php';

use Framework\Google as Google;

/**
 * SheetWriterBase
 * 
 * Class that writes to the loot sheet
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses Framework\Google\WrapperFactory 1.1.0
 * @version 1.1.0
 */
abstract class SheetWriterBase
{
    /**
     * Clear the specified range in the completion sheet
     * 
     * @param string $sheetRange The range to write the output to
     */
    protected function clearRange(string $sheetRange)
    {
        Google\WrapperFactory::createSheetsWrapper()->clear(COMPLETION_SHEET_ID, $sheetRange);
    }

    /**
     * Write the information from the specified parameter to the completion sheet
     * 
     * @param string $sheetRange The range to write the output to
     * @param BazaarOutput[]|LootOutput[] $output The output objects to write
     */
    protected function writeInformation(string $sheetRange, array $output)
    {
        $updateRows = array();
        foreach($output as $outputRow) {
            $updateRows[] = $outputRow->getUpdateRow();
        }
        Google\WrapperFactory::createSheetsWrapper()->update(COMPLETION_SHEET_ID, $sheetRange, $updateRows);
    }
}