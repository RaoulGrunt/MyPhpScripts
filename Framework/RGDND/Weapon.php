<?php

namespace Framework\RGDND;

require_once(FRAMEWORK_RGDND_LIBRARY_ITEM_CONFIG);
require_once(FRAMEWORK_RGDND_ROOT . '/Item.php');
require_once FRAMEWORK_RGDND_ITEM_UTILS . '/WeaponProfileValueUtils.php';
require_once(FRAMEWORK_RGDND_ITEM_FACTORIES . '/WeaponPerformerFactory.php');

/**
 * Weapon
 * 
 * A weapon in the world
 * 
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses Item 1.0.0
 * @uses WeaponProfileValueUtils 1.1.0
 * @uses WeaponPerformerFactory 1.0.0
 * @version 1.1.0
 */
class Weapon extends Item
{
    /** @var  string $type The weapon type */
    private string $type;
    /** @var WeaponDamagePerformer $damage The damage and type the weapon can do */
    private WeaponDamagePerformer $damage;
    /** @var string[] $properties The properties of the weapon */
    private array $properties;

    /**
     * Constructor
     * 
     * Load the specified profile for the weapon
     * 
     * @param string $weaponProfileFile The location of the weapon profile to load
     */
    public function __construct(string $weaponProfileFile)
    {
        parent::__construct($weaponProfileFile);
        $this->loadProfile($weaponProfileFile);
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
     * @param string $weaponProfileFile The location of the creature profile to load
     */
    private function loadProfile(string $weaponProfileFile)
    {
        $profileReader = ReaderFactory::createProfileReader($weaponProfileFile);
        $weaponProfile = $profileReader->profile();
        $this->type = WeaponProfileValueUtils::getType($weaponProfile);
        $this->damage = WeaponPeformerFactory::createWeaponDamagePerformer($weaponProfile);
        $this->properties = WeaponProfileValueUtils::getProperties($weaponProfile);
    }    
}