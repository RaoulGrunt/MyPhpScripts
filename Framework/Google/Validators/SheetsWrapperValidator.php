<?php

namespace Framework\Google;

require_once FRAMEWORK_GOOGLE_INTERFACES . '/SheetsWrapperInterface.php';

use Exception;

/**
 * SheetsWrapperValidator
 *
 * A validator class for SheetsWrapper
 *
 * @author Raoul de Grunt
 * @package Framework\Google
 * @uses SheetsWrapperInterface 1.1.0
 * @version 1.1.0
 */
class SheetsWrapperValidator implements SheetsWrapperInterface
{
    /**
     * Validate the parameters of the getValues() function
     * 
     * @param string $spreadsheetId The id of the spreadsheet in Google Cloud
     * @param string $range The range of cells to get values from
     * @throws Exception
     */
    public function getValues(string $spreadsheetId, string $range)
    {
        if (empty($spreadsheetId)) {
            throw new Exception('GoogleWrapper::getValues() - Empty spreadsheetId parameter');
        }
        if (empty($range)) {
            throw new Exception('GoogleWrapper::getValues() - Empty range parameter');
        }
    }

    /**
     * Validate the parameters of the update() function
     * 
     * @var string $spreadsheetId The id of the spreadsheet in Google Cloud
     * @var string $range The range of cells to apply the values to
     * @var array $updateRows An array with arrays with strings to update
     * @throws Exception
     */
    public function update(string $spreadsheetId, string $range, array $updateRows)
    {
        if (empty($spreadsheetId)) {
            throw new Exception('GoogleWrapper::update() - Empty spreadsheetId parameter');
        }
        if (empty($range)) {
            throw new Exception('GoogleWrapper::update() - Empty range parameter');
        }
        if (empty($updateRows)) {
            throw new Exception('GoogleWrapper::update() - Empty updateRows parameter');
        }
    }

    /**
     * Validate the parameters of the clear() function
     * 
     * @var string $spreadsheetId The id of the spreadsheet in Google Cloud
     * @var string $range The range of cells to clear
     */
    public function clear(string $spreadsheetId, string $range)
    {
        if (empty($spreadsheetId)) {
            throw new Exception('GoogleWrapper::clear() - Empty spreadsheetId parameter');
        }
        if (empty($range)) {
            throw new Exception('GoogleWrapper::clear() - Empty range parameter');
        }
    }
}