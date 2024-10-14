<?php

namespace Framework\RGDND;

require_once(FRAMEWORK_RGDND_LIBRARY_ITEM_CONFIG);
require_once(FRAMEWORK_RGDND_ROOT . '/Item.php');
require_once(FRAMEWORK_RGDND_ITEM_FACTORIES . '/ArmorDataFactory.php');

/**
 * Armor
 * 
 * An armor in the world
 * 
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses Item 1.0.0
 * @uses ArmorDataFactory 1.0.0
 * @version 1.0.0
 */
class Armor extends Item
{
    /** @var ArmorBasics $armorBasics The basics of the armor */
    private ArmorBasics $armorBasics;

    /**
     * Constructor
     * 
     * Load the specified profile for the armor
     * 
     * @param string $armorProfileFile The location of the armor profile to load
     */
    public function __construct(string $armorProfileFile)
    {
        parent::__construct($armorProfileFile);
        $this->loadFromProfile($armorProfileFile);
    }

    /**
     * Get the type
     * 
     * @return string
     */
    public function type(): string
    {
        return $this->armorBasics->type();
    }

    /**
     * Get the armor class
     * 
     * @return int
     */
    public function armorClass(): int
    {
        return $this->armorBasics->armorClass();
    }

    /**
     * Get the maximum added dexterity modifier
     * 
     * @return int
     */
    public function maxAddedDexModifier(): int
    {
        return $this->armorBasics->maxAddedDexModifier();
    }

    /**
     * Get the strength requirement
     * 
     * @return int
     */
    public function strengthRequirement(): int
    {
        return $this->armorBasics->strengthRequirement();
    }

    /**
     * Get if the armor imposes disadvantage
     * 
     * @return boolean
     */
    public function stealthDisadvantage(): bool
    {
        return $this->armorBasics->stealthDisadvantage();
    }

    /**
     * Load the specified profile
     * 
     * @param string $armorProfileFile The location of the armor profile to load
     */
    private function loadFromProfile(string $armorProfileFile)
    {
        $profileReader = ReaderFactory::createProfileReader($armorProfileFile);
        $armorProfile = $profileReader->profile();
        $this->armorBasics = ArmorDataFactory::createArmorBasics($armorProfile);
    }    
}