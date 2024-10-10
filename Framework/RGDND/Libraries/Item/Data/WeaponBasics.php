<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_ITEM_UTILS . '/WeaponProfileValueUtils.php';
require_once FRAMEWORK_RGDND_ITEM_FACTORIES . '/WeaponPerformerFactory.php';

/**
 * WeaponBasics
 * 
 * The basics of a weapon
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses WeaponProfileValueUtils 1.1.0
 * @uses WeaponPerformerFactory 1.0.0
 * @version 1.0.0
 */
class WeaponBasics
{
    /** @var string $type The weapon type */
    private string $type;
    /** @var WeaponDamagePerformer $damage The damage and type the weapon can do */
    private WeaponDamagePerformer $damage;
    /** @var string[] $properties The properties of the weapon */
    private array $properties;

    /**
     * Constructor
     * 
     * Load the basics from the specified profile
     * 
     * @param string[] $itemProfile The profile to load the basics from
     */
    public function __construct(array $itemProfile)
    {
        $this->loadFromProfile($itemProfile);
    }

    /**
     * Get the type
     * 
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }

    /**
     * Roll damage with this weapon
     * 
     * @return Damage
     */
    public function rollDamage(): Damage
    {
        return $this->damage->roll();
    }

    /**
     * Get the properties
     * 
     * @return string[]
     */
    public function properties(): array
    {
        return $this->properties;
    }

    /**
     * Load the specified profile
     * 
     * @param array $weaponProfile The profile to load the basics from
     */
    private function loadFromProfile(array $weaponProfile)
    {
        $this->type = WeaponProfileValueUtils::getType($weaponProfile);
        $this->damage = WeaponPeformerFactory::createWeaponDamagePerformer($weaponProfile);
        $this->properties = WeaponProfileValueUtils::getProperties($weaponProfile);
    }   
}