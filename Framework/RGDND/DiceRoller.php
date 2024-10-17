<?php

namespace Framework\RGDND;

/**
 * DiceRoller
 * 
 * Class for rolling dice
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @version 1.1.0
 */
class DiceRoller
{
    /**
     * Roll the specified dice
     * 
     * @param int $dice The dice to roll
     * @return int
     */
    public static function roll(int $dice): int
    {
        return rand(1, $dice);
    }

    /**
     * Roll the specified dice with advantage
     * 
     * @param int $dice The dice to roll
     * @return int
     */
    public static function rollAdvantage(int $dice): int
    {
        $roll1 = self::roll($dice);
        $roll2 = self::roll($dice);
        return max($roll1, $roll2);
    }

    /**
     * Roll the specified dice with disadvantage
     * 
     * @param int $dice The dice to roll
     * @return int
     */
    public static function rollDisadvantage(int $dice): int
    {
        $roll1 = self::roll($dice);
        $roll2 = self::roll($dice);
        return min($roll1, $roll2);
    }

    /**
     * Roll the specified dice multiple times
     * 
     * @param int $dice The dice to roll
     * @return int
     */
    public static function rollMultiple(int $dice, int $times): int
    {
        $result = 0;
        for($i = 1; $i <= $times; $i++)
        {
            $result += rand(1, $dice);
        }
        return $result;
    }
}