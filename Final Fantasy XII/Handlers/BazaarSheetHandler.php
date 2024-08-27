<?php

require_once SCRIPT_BASECLASSES . '/HandlerBase.php';
require_once SCRIPT_DATA . '/BazaarOutput.php';
require_once SCRIPT_FACTORIES . '/BazaarSheetFactory.php';

/**
 * BazaarSheetHandler
 * 
 * Class that handles the bazaar item
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses HandlerBase 1.0.0
 * @uses BazaarSheetFactory 1.2.0
 * @version 1.0.2
 */
class BazaarSheetHandler extends HandlerBase
{
    /**
     * Get the output for every specified bazaar item
     * 
     * @param string[] $bazaarList The list of bazaar items to handle
     * @return BazaarOutput[]
     */
    public function getBazaarOutput(array $bazaarList): array
    {
        return $this->getOutput($bazaarList);
    }

    /**
     * Get the BazaarOutput for the specified loot
     * 
     * @param string $bazaarName The name of the loot item
     * @return BazaarOutput
     */
    protected function getOutputFor(string $bazaarName): BazaarOutput
    {
        $databaseReader = BazaarSheetFactory::createBazaarSheetDatabaseReader();
        $bazaarLoot = $databaseReader->getBazaarLoot($bazaarName);
        return BazaarSheetFactory::createBazaarOutput($bazaarLoot);
    }
}