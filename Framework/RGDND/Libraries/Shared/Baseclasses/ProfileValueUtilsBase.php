<?php

namespace Framework\RGDND;

/**
 * ProfileValueUtilsBase
 * 
 * Base class for values loaded from a profile
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @version 1.1.0
 */
abstract class ProfileValueUtilsBase
{
    /**
     * Get the type
     * 
     * @param string[] $weaponProfile The unpacked weapon profile
     * @return string
     */
    public static function getType(array $weaponProfile): string
    {
        return self::getValue($weaponProfile, 'type');
    }

    /**
     * Get the specified value from the profile
     * 
     * @param string[] $profile
     * @param string $index
     * @return string
     * @throws \Exception
     */
    protected static function getValue(array $profile, string $index): string
    {
        if (!array_key_exists($index, $profile)) {
            throw new \Exception('The requested index "' . $index . '" is not present in the profile');
        }
        return $profile[$index];
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