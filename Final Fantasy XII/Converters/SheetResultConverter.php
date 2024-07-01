<?php

/**
 * Converter class that converts values from sheets
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.1
 */
class SheetResultConverter
{
    /**
     * Convert single column values to regular array
     * 
     * @param string[][] $sheetResult The result from the sheet
     * @return string[]
     */
    public static function convertSingleColumnValues(array $sheetResult): array
    {
        $result = array();
        foreach($sheetResult as $column) {
            $result[] = $column[0];
        }
        return $result;
    }
}