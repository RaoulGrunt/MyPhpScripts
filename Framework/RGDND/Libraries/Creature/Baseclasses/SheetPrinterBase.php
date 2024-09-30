<?php

namespace Framework\RGDND;

/**
 * SheetPrinterBase
 * 
 * Base class for sheet printers
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @version 1.0.0
 */
abstract class SheetPrinterBase
{
    /**
     * Print a line of the sheet
     * 
     * @param string $text The text to print
     */
    protected static function printLine(string $text)
    {
        print($text . PHP_EOL);
    }

    /**
     * Print a divider
     */
    protected static function printDivider()
    {
        self::printLine('--------------------');
    }

    /**
     * Get the text for a modifier
     * 
     * @param int $abilityScore The ability score to get the text for
     * @return string
     */
    protected static function getAbilityScoreText(int $abilityScore): string
    {
        $result = $abilityScore;
        if ($abilityScore < 10) {
            $result = ' ' . $result;
        }
        return $result;
    }

    /**
     * Get the text for a modifier
     * 
     * @param int $modifier The modifier to get the text for
     * @return string
     */
    protected static function getModifierText(int $modifier): string
    {
        $result = $modifier;
        if ($modifier >= 0) {
            $result = '+' . $result;
        }
        return $result;
    }
}