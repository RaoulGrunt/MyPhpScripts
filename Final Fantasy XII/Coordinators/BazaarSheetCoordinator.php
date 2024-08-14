<?php

require_once SCRIPT_FACTORIES . '/BazaarSheetFactory.php';

/**
 * BazaarSheetCoordinator
 * 
 * The coordinator class for the completion sheet
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses BazaarSheetFactory 1.0.0
 * @version 1.0.0
 */
class BazaarSheetCoordinator
{
    /**
     * Update the bazaar sheet
     */
    public function updateBazaarSheet()
    {
        $bazaarList = BazaarSheetFactory::createBazaarSheetSheetReader()->getBazaarNames();
        $output = BazaarSheetFactory::createBazaarSheetHandler()->getBazaarOutput($bazaarList);
        BazaarSheetFactory::createBazaarSheetSheetWriter()->writeBazaarInformation($output);
    }
}