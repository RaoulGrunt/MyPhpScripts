<?php

require_once SCRIPT_BASECLASSES . '/FactoryBase.php';
require_once SCRIPT_COORDINATORS . '/LootSheetCoordinator.php';
require_once SCRIPT_READERS . '/LootSheetSheetReader.php';
require_once SCRIPT_HANDLERS . '/LootSheetHandler.php';
require_once SCRIPT_READERS . '/LootSheetDatabaseReader.php';
require_once SCRIPT_DATA . '/LootOutput.php';
require_once SCRIPT_WRITERS . '/LootSheetSheetWriter.php';

/**
 * LootSheetFactory
 * 
 * Class that created objects from the update loot sheet script
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @uses FactoryBase 1.1.0
 * @uses LootSheetCoordinator 1.0.0
 * @uses LootSheetSheetReader 1.0.0
 * @uses LootSheetHandler 1.0.0
 * @uses LootSheetDatabaseReader 1.1.0
 * @uses LootOutput 1.2.0
 * @uses LootSheetSheetWriter 1.0.0
 * @version 1.1.0
 */
class LootSheetFactory extends FactoryBase
{
    /**
     * Create a LootSheetCoordinator object
     * 
     * @return LootSheetCoordinator
     */
    public static function createLootSheetCoordinator(): LootSheetCoordinator
    {
        return new LootSheetCoordinator();
    }

    /**
     * Create a createLootSheetSheetReader object
     * 
     * @return LootSheetSheetReader
     */
    public static function createLootSheetSheetReader(): LootSheetSheetReader
    {
        return new LootSheetSheetReader();
    }

    /**
     * Create a LootSheetHandler object
     * 
     * @return LootSheetHandler
     */
    public static function createLootSheetHandler(): LootSheetHandler
    {
        return new LootSheetHandler();
    }

    /**
     * Create a LootSheetDatabaseReader object
     * 
     * @return LootSheetDatabaseReader
     */
    public static function createLootSheetDatabaseReader(): LootSheetDatabaseReader
    {
        return new LootSheetDatabaseReader();
    }

    /**
     * Create a LootOutput object
     * 
     * @param string $lootName Name of the loot to create output for
     * @return LootOutput
     */
    public static function createLootOutput(string $lootName): LootOutput
    {
        return new LootOutput($lootName);
    }

    /**
     * Create a LootSheetSheetWriter object
     * 
     * @return LootSheetSheetWriter
     */
    public static function createLootSheetSheetWriter(): LootSheetSheetWriter
    {
        return new LootSheetSheetWriter();
    }
}