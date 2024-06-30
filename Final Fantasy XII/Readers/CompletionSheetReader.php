<?php

require_once FRAMEWORK_GOOGLE_FACTORIES . '/WrapperFactory.php';
require_once FF12_CONVERTERS . '/SheetResultConverter.php';

use Framework\Google as Google;

/**
 * CompletionSheetReader
 * 
 * Class that reads information from the completion sheet
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.0
 */
class CompletionSheetReader
{
    /**
     * Get the values from the loot sheet defined in the config
     * 
     * @return string[]
     */
    public function getLootNames(): array
    {
        $sheetResult = Google\WrapperFactory::createSheetsWrapper()->getValues(COMPLETION_SHEET_ID, SHEET_LOOT_NAME_RANGE);
        return SheetResultConverter::convertSingleColumnValues($sheetResult);
    }
}