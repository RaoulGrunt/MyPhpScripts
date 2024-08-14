<?php

require_once FRAMEWORK_GOOGLE_FACTORIES . '/WrapperFactory.php';
require_once SCRIPT_CONVERTERS . '/SheetResultConverter.php';

use Framework\Google as Google;

/**
 * SheetReaderBase
 * 
 * Base class for SheetReaders
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses Framework\Google\WrapperFactory 1.0.0
 * @uses SheetResultConverter 1.0.0
 * @version 1.0.0
 */
abstract class SheetReaderBase
{
    /**
     * Get the values from a range with a single colum
     * 
     * @param string $range The range to get
     * @return string[] The converted values from the range
     */
    protected function getSingleColumnRangeValues(string $range): array
    {
        $sheetResult = Google\WrapperFactory::createSheetsWrapper()->getValues(COMPLETION_SHEET_ID, $range);
        return SheetResultConverter::convertSingleColumnValues($sheetResult);
    }
}