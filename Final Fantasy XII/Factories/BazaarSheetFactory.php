<?php

require_once SCRIPT_BASECLASSES . '/FactoryBase.php';
require_once SCRIPT_COORDINATORS . '/BazaarSheetCoordinator.php';
require_once SCRIPT_READERS . '/BazaarSheetSheetReader.php';
require_once SCRIPT_HANDLERS . '/BazaarSheetHandler.php';
require_once SCRIPT_READERS . '/BazaarSheetDatabaseReader.php';
require_once SCRIPT_DATA . '/BazaarOutput.php';
require_once SCRIPT_WRITERS . '/BazaarSheetSheetWriter.php';

/**
 * BazaarSheetFactory
 * 
 * Class that created objects from the Final Fantasy 12 folder
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses FactoryBase 1.1.0
 * @uses BazaarSheetCoordinator 1.0.0
 * @uses BazaarSheetSheetReader 1.0.0
 * @uses BazaarSheetHandler 1.0.0
 * @uses BazaarSheetDatabaseReader 1.2.0
 * @uses BazaarOutput 1.0.0
 * @uses BazaarSheetSheetWriter 1.0.0
 * @version 1.2.0
 */
class BazaarSheetFactory extends FactoryBase
{
    /**
     * Create a BazaarSheetCoordinator object
     * 
     * @return BazaarSheetCoordinator
     */
    public static function createBazaarSheetCoordinator(): BazaarSheetCoordinator
    {
        return new BazaarSheetCoordinator();
    }

    /**
     * Create a BazaarSheetSheetReader object
     * 
     * @return BazaarSheetSheetReader
     */
    public static function createBazaarSheetSheetReader(): BazaarSheetSheetReader
    {
        return new BazaarSheetSheetReader();
    }

    /**
     * Create a BazaarSheetHandler object
     * 
     * @return BazaarSheetHandler
     */
    public static function createBazaarSheetHandler(): BazaarSheetHandler
    {
        return new BazaarSheetHandler();
    }

    /**
     * Create a BazaarSheetDatabaseReader object
     * 
     * @return BazaarSheetDatabaseReader
     */
    public static function createBazaarSheetDatabaseReader(): BazaarSheetDatabaseReader
    {
        return new BazaarSheetDatabaseReader();
    }

    /**
     * Create a BazaarOutput object
     * 
     * @param array $bazaarLoot Array of bazaar loot 
     * @return BazaarOutput
     */
    public static function createBazaarOutput(array $bazaarLoot): BazaarOutput
    {
        return new BazaarOutput($bazaarLoot);
    }

    /**
     * Create a BazaarSheetSheetWriter object
     * 
     * @return BazaarSheetSheetWriter
     */
    public static function createBazaarSheetSheetWriter(): BazaarSheetSheetWriter
    {
        return new BazaarSheetSheetWriter();
    }
}