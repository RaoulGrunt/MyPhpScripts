<?php

namespace Framework\RGDND;

require_once(FRAMEWORK_RGDND_LIBRARY_ITEM_CONFIG);
require_once(FRAMEWORK_RGDND_ROOT . '/Item.php');
require_once(FRAMEWORK_RGDND_ITEM_FACTORIES . '/WeaponPerformerFactory.php');

/**
 * Weapon
 * 
 * A weapon in the world
 * 
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses Item 1.0.0
 * @version 1.0.0
 */
class Weapon extends Item
{
    /** @var WeaponDamagePerformer $damage The damage and type the weapon can do */
    private WeaponDamagePerformer $damage;

    /**
     * Constructor
     * 
     * Load the specified profile for the weapon
     * 
     * @param string $weaponProfileFile The location of the weapon profile to load
     */
    public function __construct(string $weaponProfileFile)
    {
        $this->loadProfile($weaponProfileFile);
    }

    /**
     * Roll damage with this weapon
     * 
     * @return int
     */
    public function rollDamage(): int
    {
        return $this->damage->roll();
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
        $this->damage = WeaponPeformerFactory::createWeaponDamagePerformer($weaponProfile);
    }    
}