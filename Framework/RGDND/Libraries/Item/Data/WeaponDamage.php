<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_ITEM_UTILS . '/WeaponProfileValueUtils.php';

/**
 * WeaponDamage
 * 
 * The damage of a weapon
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses WeaponProfileValueUtils 1.0.0
 * @version 1.0.0
 */
class WeaponDamage
{
    /** @var int $damageDice The damage dice of a weapon */
    private string $damageDice;
    /** @var int $damageTimes The number of damage dice to roll */
    private int $damageTimes;
    /** @var string $damageType The type of damage */
    private string $damageType;

    /**
     * Constructor
     * 
     * Load the weapon damage from the specified profile
     * 
     * @param string[] $itemProfile The profile to load the weapon damage from
     */
    public function __construct(array $itemProfile)
    {
        $this->loadFromProfile($itemProfile);
    }

    /**
     * Get the damage dice
     * 
     * @return int
     */
    public function damageDice(): int
    {
        return $this->damageDice;
    }

    /**
     * Get the times the damage dice is rolled
     * 
     * @return int
     */
    public function damageTimes(): int
    {
        return $this->damageTimes();
    }

    /**
     * Get the damage type
     * 
     * @return string
     */
    public function damageType(): int
    {
        return $this->damageType();
    }

    /**
     * Load the weapon damage from the specified profile
     * 
     * @param string[] $itemProfile The profile to load the weapon damage from
     */
    private function loadFromProfile(array $itemProfile)
    {
        $this->damageDice = WeaponProfileValueUtils::getDamageDice($itemProfile);
        $this->damageTimes = WeaponProfileValueUtils::getDamageTimes($itemProfile);
        $this->damageType = WeaponProfileValueUtils::getDamageType($itemProfile);
    }
}