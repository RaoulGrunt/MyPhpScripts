<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_ITEM_UTILS . '/ArmorProfileValueUtils.php';

/**
 * ArmorBasics
 * 
 * The basics of a armor
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses ArmorProfileValueUtils 1.0.0
 * @version 1.0.0
 */
class ArmorBasics
{
    /** @var string $type The armor type */
    private string $type;
    /** @var int $armorClass The armor class */
    private int $armorClass;
    /** @var int $maxAddedDexMod The maximum dexterity modifier that can be added */
    private int $maxAddedDexMod;
    /** @var int $minumumStr The minimum strenth score that can be added */
    private int $strRequirement;
    /** @var bool $stealthDisadvantage Wether a stealth check has disadvantage */
    private bool $stealthDisadvantage;

    /**
     * Constructor
     * 
     * Load the basics from the specified profile
     * 
     * @param string[] $armorProfile The profile to load the basics from
     */
    public function __construct(array $armorProfile)
    {
        $this->loadFromProfile($armorProfile);
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
     * Get the armor class
     * 
     * @return int
     */
    public function armorClass(): int
    {
        return $this->armorClass;
    }

    /**
     * Get the maximum added dexterity modifier
     * 
     * @return int
     */
    public function maxAddedDexModifier(): int
    {
        return $this->maxAddedDexMod;
    }

    /**
     * Get the strength requirement
     * 
     * @return int
     */
    public function strengthRequirement(): int
    {
        return $this->strRequirement;
    }

    /**
     * Get if the armor imposes disadvantage
     * 
     * @return boolean
     */
    public function stealthDisadvantage(): bool
    {
        return $this->stealthDisadvantage;
    }

    /**
     * Load the specified profile
     * 
     * @param array $armorProfile The profile to load the basics from
     */
    private function loadFromProfile(array $armorProfile)
    {
        $this->type = ArmorProfileValueUtils::getType($armorProfile);
        $this->armorClass = ArmorProfileValueUtils::getArmorClass($armorProfile);
        $this->maxAddedDexMod = ArmorProfileValueUtils::getMaxAddedDexMod($armorProfile);
        $this->strRequirement = ArmorProfileValueUtils::getStrengthRequirement($armorProfile);
        $this->stealthDisadvantage = ArmorProfileValueUtils::getStealthDisadvantage($armorProfile);
    }
}