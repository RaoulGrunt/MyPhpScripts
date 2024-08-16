<?php

namespace Framework\Google;

/**
 * Interface SheetsWrapperInterface
 * 
 * The interface that describes functions for the Sheetswrapper
 *
 * @author Raoul de Grunt
 * @package Framework\Google
 * @version 1.1.0
 */
interface SheetsWrapperInterface
{
    public function getValues(string $spreadsheetId, string $range);
    public function update(string $spreadsheetId, string $range, array $updateRows);
    public function clear(string $spreadsheetId, string $range);
}