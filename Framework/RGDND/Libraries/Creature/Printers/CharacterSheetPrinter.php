<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_BASECLASSES . '/SheetPrinterBase.php';

/**
 * CharacterSheetPrinter
 * 
 * Class that prints the character sheet
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses SheetPrinterBase 1.0.0
 * @version 1.0.0
 */
class CharacterSheetPrinter extends SheetPrinterBase
{
    /**
     * Print the character sheet
     * 
     * @param CreatureSheetOutput $output The output data for the character
     */
    public static function print(CreatureSheetOutput $output)
    {
        self::printBasics($output->basics());
        self::printStatictics($output->statistics());
        self::printAbilityScores($output->statistics());
        self::printSavingThrows($output->saves());
        self::printSenses($output->senses());
        self::printSkills($output->skills());
    }

    /**
     * Print the character basics
     * 
     * @param CreatureBasics $basics The basics of the creature
     */
    private static function printBasics(CreatureBasics $basics)
    {
        self::printLine('Character Name: ' . $basics->name());
        self::printDivider();
        self::printLine('Class & Level: '); //ToDo
        self::printLine('Race: ' . $basics->race());
        self::printLine('Background: '); //ToDo
        self::printLine('Experience Points: '); //ToDo
    }

    /**
     * Print the statistics of the character
     * 
     * @param CreatureStatistics $statistics The statistics of the creature
     */
    private static function printStatictics(CreatureStatistics $statistics)
    {
        self::printDivider();
        self::printLine('Movement: ' . $statistics->movementSpeed() . 'ft');
        self::printLine('Initiative: '); //ToDo
        self::printLine('Armor Class: ' . $statistics->armorClass());
        self::printLine('Max HP: ' . $statistics->hitPoints()->maxHitpoints());
        self::printLine('Current HP: ' . $statistics->hitPoints()->currentHitpoints());
        self::printLine('Temp HP: '); //ToDo
    }

    /**
     * Print the ability scores of the character
     * 
     * @param CreatureStatistics $statistics The statistics of the creature
     */
    private static function printAbilityScores(CreatureStatistics $statistics)
    {
        self::printLine('');
        self::printLine('-------------------------------------');
        self::printLine('| STR | DEX | CON | INT | WIS | CHA |');
        self::printLine('-------------------------------------');
        print('|  ' . self::getAbilityScoreText($statistics->abilityScores()->getScoreFor(ABILITY_STRENGTH)) . ' ');
        print('|  ' . self::getAbilityScoreText($statistics->abilityScores()->getScoreFor(ABILITY_DEXTERITY)) . ' ');
        print('|  ' . self::getAbilityScoreText($statistics->abilityScores()->getScoreFor(ABILITY_CONSTITUTION)) . ' ');
        print('|  ' . self::getAbilityScoreText($statistics->abilityScores()->getScoreFor(ABILITY_INTELLIGENCE)) . ' ');
        print('|  ' . self::getAbilityScoreText($statistics->abilityScores()->getScoreFor(ABILITY_WISDOM)) . ' ');
        print('|  ' . self::getAbilityScoreText($statistics->abilityScores()->getScoreFor(ABILITY_CHARISMA)) . ' |' . PHP_EOL);
        self::printLine('-------------------------------------');
        print('|  ' . self::getModifierText($statistics->abilityModifiers()->getScoreFor(MODIFIER_STRENGTH)) . ' ');
        print('|  ' . self::getModifierText($statistics->abilityModifiers()->getScoreFor(MODIFIER_DEXTERITY)) . ' ');
        print('|  ' . self::getModifierText($statistics->abilityModifiers()->getScoreFor(MODIFIER_CONSTITUTION)) . ' ');
        print('|  ' . self::getModifierText($statistics->abilityModifiers()->getScoreFor(MODIFIER_INTELLIGENCE)) . ' ');
        print('|  ' . self::getModifierText($statistics->abilityModifiers()->getScoreFor(MODIFIER_WISDOM)) . ' ');
        print('|  ' . self::getModifierText($statistics->abilityModifiers()->getScoreFor(MODIFIER_CHARISMA)) . ' |' . PHP_EOL);
        self::printLine('-------------------------------------' . PHP_EOL);
    }

    /**
     * Print the saving throws of the character
     * 
     * @param CreatureSaves $saves The saves of the character
     */
    private static function printSavingThrows(CreatureSaves $saves)
    {
        self::printLine('');
        self::printLine('Saving Throws');
        self::printLine(self::getModifierText($saves->getModifierFor(SAVE_STRENGTH)) . ' Strength');
        self::printLine(self::getModifierText($saves->getModifierFor(SAVE_DEXTERITY)) . ' Dexterity');
        self::printLine(self::getModifierText($saves->getModifierFor(SAVE_CONSTITUTION)) . ' Constitution');
        self::printLine(self::getModifierText($saves->getModifierFor(SAVE_INTELLIGENCE)) . ' Intelligence');
        self::printLine(self::getModifierText($saves->getModifierFor(SAVE_WISDOM)) . ' Wisdom');
        self::printLine(self::getModifierText($saves->getModifierFor(SAVE_CHARISMA)) . ' Charisma');
    }

    /**
     * Print the senses of the character
     * 
     * @param CreatureSenses $senses The senses of the character
     */
    private static function printSenses(CreatureSenses $senses)
    {
        self::printLine('');
        self::printLine('Senses');
        self::printLine($senses->getValueFor(SKILL_PERCEPTION) . ' Passive Perception');
        self::printLine($senses->getValueFor(SKILL_INVESTIGATION) . ' Passive Investigation');
        self::printLine($senses->getValueFor(SKILL_INSIGHT) . ' Passive Insight');
    }

    /**
     * Print the skills of the character
     * 
     * @param CreatureSkills $skills The skills of the character
     */
    private static function printSkills(CreatureSkills $skills)
    {
        self::printLine('');
        self::printLine('Skills');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_ACROBATICS)) . ' DEX Acrobatics');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_ANIMAL_HANDLING)) . ' WIS Animal Handling');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_ARCANA)) . ' INT Arcana');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_ATHLETICS)) . ' STR Athletics');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_DECEPTION)) . ' CHA Deception');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_HISTORY)) . ' INT History');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_INSIGHT)) . ' WIS Insight');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_INTIMIDATION)) . ' CHA Intimidation');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_INVESTIGATION)) . ' INT Investigation');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_MEDICINE)) . ' WIS Medicine');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_NATURE)) . ' INT Nature');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_PERCEPTION)) . ' WIS Perception');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_PERFORMANCE)) . ' CHA Performance');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_PERSUASSION)) . ' CHA Persuassion');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_RELIGION)) . ' INT Religion');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_SLEIGHT_OF_HAND)) . ' DEX Sleight of Hand');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_STEALTH)) . ' DEX Stealth');
        self::printLine(self::getModifierText($skills->getModifierFor(SKILL_SURVIVAL)) . ' WIS Survival');
    }
}