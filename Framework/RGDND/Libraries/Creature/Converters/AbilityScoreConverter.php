<?php

namespace Framework\RGDND;

/**
 * Converter class that converts ability scores
 * 
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @version 1.0.0
 */
class AbilityScoreConverter
{
    /**
     * Convert the specified score to a modifier
     * 
     * @param int $abilityScore The ability score to convert to a modifier
     * @return int
     */
    public static function convertToModifier(int $abilityScore): int
    {
        return floor(($abilityScore - 10) / 2);
    }
}