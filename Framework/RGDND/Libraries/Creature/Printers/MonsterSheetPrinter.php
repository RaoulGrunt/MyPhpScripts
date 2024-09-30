<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_BASECLASSES . '/SheetPrinterBase.php';

/**
 * MonsterSheetPrinter
 * 
 * Class that prints the monster sheet
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses SheetPrinterBase 1.0.0
 * @version 1.0.0
 */
class MonsterSheetPrinter extends SheetPrinterBase
{
    /**
     * Print the monster sheet
     * 
     * @param CreatureSheetOutput $output The output data for the monster
     */
    public static function print(CreatureSheetOutput $output)
    {
        print(PHP_EOL);
        self::printBasics($output->basics());
        self::printStatictics($output->statistics());
        self::printAbilityScores($output->statistics());
        print(PHP_EOL);
    }

    /**
     * Print the basics of the monster
     * 
     * @param CreatureBasics $basics The basics of the creature
     */
    private static function printBasics(CreatureBasics $basics)
    {
        self::printLine($basics->name());
        self::printLine($basics->race() . ', ' . $basics->alignment());
        self::printDivider();
    }

    /**
     * Print the statistics of the monster
     * 
     * @param CreatureStatistics $statistics The statistics of the creature
     */
    private static function printStatictics(CreatureStatistics $statistics)
    {
        self::printLine('Armor Class: ' . $statistics->armorClass());
        self::printLine('Hit Points: ' . $statistics->hitPoints()->maxHitpoints());
        self::printLine('Movement: ' . $statistics->movementSpeed() . 'ft');
        self::printDivider();
    }

    /**
     * Print the ability scores of the monster
     * 
     * @param CreatureStatistics $statistics The statistics of the creature
     */
    private static function printAbilityScores(CreatureStatistics $statistics)
    {
        self::printLine('-------------------------------------');
        self::printLine('| STR | DEX | CON | INT | WIS | CHA |');
        self::printLine('-------------------------------------');
        print('|  ' . $statistics->abilityScores()->getScoreFor(ABILITY_STRENGTH) . ' ');
        print('|  ' . $statistics->abilityScores()->getScoreFor(ABILITY_DEXTERITY) . ' ');
        print('|  ' . $statistics->abilityScores()->getScoreFor(ABILITY_CONSTITUTION) . ' ');
        print('|  ' . $statistics->abilityScores()->getScoreFor(ABILITY_INTELLIGENCE) . ' ');
        print('|  ' . $statistics->abilityScores()->getScoreFor(ABILITY_WISDOM) . ' ');
        print('|  ' . $statistics->abilityScores()->getScoreFor(ABILITY_CHARISMA) . ' |' . PHP_EOL);
        self::printLine('-------------------------------------');
    }
}