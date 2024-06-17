<?php

namespace Framework\Google;

require_once FRAMEWORK_GOOGLE_BASECLASSES . '/ServiceAccountBase.php';
require_once FRAMEWORK_GOOGLE_INTERFACES . '/SheetsWrapperInterface.php';
require_once FRAMEWORK_GOOGLE_VALIDATORS . '/SheetsWrapperValidator.php';

use Google_Service_Sheets;

/**
 * SheetsWrapper
 *
 * A wrapper class for Google Sheets
 *
 * @author Raoul de Grunt
 * @package Framework\Google
 * @link https://github.com/googleapis/google-api-php-client
 * @version 1.0.0
 */
class SheetsWrapper extends ServiceAccountBase implements SheetsWrapperInterface
{
    /** @var Google_Service_Sheets $service */
    private Google_Service_Sheets $service;
    /** @var SheetsWrapperValidator $validator */
    private SheetsWrapperValidator $validator;

    /**
     * Constructor.
     * 
     * Create and initialize the google client
     */
    function __construct()
    {
        parent::__construct();
        $this->setClassProperties();
    }

    /**
     * Get values from the specific spreadsheet and range
     * 
     * @param string $spreadsheetId The id of the spreadsheet in Google Cloud
     * @param string $range The range of cells to get values from
     * @return string[][]
     */
    public function getValues(string $spreadsheetId, string $range): array
    {
        $response = $this->service->spreadsheets_values->get($spreadsheetId, $range);
        return $response->getValues();
    }

    /**
     * Write the specified text to the specified cell
     * 
     * @var string $spreadsheetId The id of the spreadsheet in Google Cloud
     * @var string $range The range of cells to apply the values to
     * @var array $updateRows An array with arrays with strings to update
     */
    public function update(string $spreadsheetId, string $range, array $updateRows)
    {
        $valueRange = new \Google_Service_Sheets_ValueRange();
        $valueRange->setValues($updateRows);
        $options = ['valueInputOption' => 'USER_ENTERED'];
        $this->service->spreadsheets_values->update($spreadsheetId, $range, $valueRange, $options);
    }

    /**
     * Set the class properties
     */
    private function setClassProperties()
    {
        $this->initializeGoogleClient();
        $this->service = new Google_Service_Sheets($this->client);
        $this->validator = new SheetsWrapperValidator();        
    }

    /**
     * Initialize the google client with Sheets specific values
     */
    private function initializeGoogleClient()
    {
        $this->client->setApplicationName('Google Sheets API');
        $this->client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $this->client->setAccessType('offline');
    }
}