<?php

namespace Framework\RGDND;

/**
 * ProfileValueUtilsBase
 * 
 * Base class for values loaded from a profile
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @version 1.0.0
 */
abstract class ProfileValueUtilsBase
{
    /**
     * Get the specified value from the profile
     * 
     * @param string[] $creatureProfile
     * @param string $index
     * @return string
     */
    protected static function getValue(array $creatureProfile, string $index): string
    {
        return $creatureProfile[$index];
    }

    /**
     * Create an array from a value
     * 
     * @param string $value
     * @return array
     */
    protected static function explodeArrayValue(string $value): array
    {
        $result = array();
        if (!empty($value)) {
            $result = explode(';', $value);
        }
        return $result;
    }
}