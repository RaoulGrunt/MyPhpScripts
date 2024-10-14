<?php

namespace Framework\RGDND;

require_once(FRAMEWORK_RGDND_LIBRARY_ITEM_CONFIG);
require_once(FRAMEWORK_RGDND_ROOT . '/Item.php');
require_once(FRAMEWORK_RGDND_ITEM_FACTORIES . '/WeaponDataFactory.php');

/**
 * Weapon
 * 
 * A weapon in the world
 * 
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses Item 1.0.0
 * @uses WeaponDataFactory 1.0.0
 * @version 1.1.2
 */
class Weapon extends Item
{
    /** @var WeaponBasics $weaponBasics The basics of the weapon */
    private WeaponBasics $weaponBasics;

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
        $this->loadFromProfile($weaponProfileFile);
    }

    /**
     * Get the type
     * 
     * @return string
     */
    public function type(): string
    {
        return $this->weaponBasics->type();
    }

    /**
     * Roll damage with this weapon
     * 
     * @return Damage
     */
    public function rollDamage(): Damage
    {
        return $this->weaponBasics->rollDamage();
    }

    /**
     * Get the properties
     * 
     * @return string[]
     */
    public function properties(): array
    {
        return $this->weaponBasics->properties();
    }

    /**
     * Load the specified profile
     * 
     * @param string $weaponProfileFile The location of the weapon profile to load
     */
    private function loadFromProfile(string $weaponProfileFile)
    {
        $profileReader = ReaderFactory::createProfileReader($weaponProfileFile);
        $weaponProfile = $profileReader->profile();
        $this->weaponBasics = WeaponDataFactory::createWeaponBasics($weaponProfile);
    }    
}