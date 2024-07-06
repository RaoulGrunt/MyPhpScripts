<?php

require_once FF12_BASECLASSES . '/HandlerBase.php';
require_once FF12_DATA . '/BazaarOutput.php';
require_once FF12_FACTORIES . '/FF12Factory.php';

/**
 * BazaarHandler
 * 
 * Class that handles the bazaar item
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.0
 */
class BazaarHandler extends HandlerBase
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
        $databaseReader = FF12Factory::createDatabaseReader();
        $bazaarLoot = $databaseReader->getBazaarLoot($bazaarName);
        return FF12Factory::createBazaarOutput($bazaarLoot);
    }
}