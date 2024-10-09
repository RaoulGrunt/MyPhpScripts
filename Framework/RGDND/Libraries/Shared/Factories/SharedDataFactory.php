<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_SHARED_DATA . '/Damage.php';

/**
 * SharedDataFactory
 * 
 * Class that creates shared data objects
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses Damage 1.0.0
 * @version 1.0.0
 */
class SharedDataFactory
{
    /**
     * Create a Damage object
     * 
     * @param int $amount The amount of damage
     * @param string $type The type of damage
     * @return Damage
     */
    public static function createDamage(int $amount, string $type): Damage
    {
        return new Damage($amount, $type);
    }
}