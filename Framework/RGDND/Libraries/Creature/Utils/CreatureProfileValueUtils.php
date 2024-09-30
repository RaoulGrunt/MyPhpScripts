<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_CONVERTERS . '/AbilityScoreConverter.php';

/**
 * CreatureProfileValueUtils
 * 
 * Utils class for values loaded from a creature profile
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses AbilityScoreConverter
 * @version 1.0.0
 */
class CreatureProfileValueUtils
{
    /**
     * Get the creature name
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return string
     */
    public static function getName(array $creatureProfile): string
    {
        return self::getValue($creatureProfile, 'name');
    }

    /**
     * Get the creature race
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return string
     */
    public static function getRace(array $creatureProfile): string
    {
        return self::getValue($creatureProfile, 'race');
    }

    /**
     * Get the creature alignment
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return string
     */
    public static function getAlignment(array $creatureProfile): string
    {
        return self::getValue($creatureProfile, 'alignment');
    }

    /**
     * Get the armor class
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return int
     */
    public static function getArmorClass(array $creatureProfile): int
    {
        return intval(self::getValue($creatureProfile, 'armorclass'));
    }

    /**
     * Get the max HP
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return int
     */
    public static function getMaxHP(array $creatureProfile): int
    {
        $result = self::getValue($creatureProfile, 'baseHP');
        $hitDiceTimes = self::getValue($creatureProfile, 'hitDiceTimes');
        if ($hitDiceTimes > 0) {
            $hitDice = self::getValue($creatureProfile, 'hitDice');
            $conModifier = AbilityScoreConverter::convertToModifier(self::getConstitution($creatureProfile));
            for ($i = 1; $i <= $hitDiceTimes; $i++) {
                $result = $result + rand(1, $hitDice) + $conModifier;
            }
        }        
        return $result;
    }

    /**
     * Get the current HP
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @param int $maxHP The value set when profile has -1
     * @return int
     */
    public static function getCurrentHP(array $creatureProfile, int $maxHP = 0): int
    {
        $result = self::getValue($creatureProfile, 'currentHP');
        if ($result == -1) {
            $result = $maxHP;
        }
        return $result;
    }

    /**
     * Get the movement
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return int
     */
    public static function getMovement(array $creatureProfile): int
    {
        return intval(self::getValue($creatureProfile, 'movement'));
    }

    /**
     * Get the strength
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return int
     */
    public static function getStrength(array $creatureProfile): int
    {
        return intval(self::getValue($creatureProfile, 'str'));
    }

    /**
     * Get the dexterity
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return int
     */
    public static function getDexterity(array $creatureProfile): int
    {
        return intval(self::getValue($creatureProfile, 'dex'));
    }

    /**
     * Get the constitution
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return int
     */
    public static function getConstitution(array $creatureProfile): int
    {
        return intval(self::getValue($creatureProfile, 'con'));
    }

    /**
     * Get the intelligence
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return int
     */
    public static function getIntelligence(array $creatureProfile): int
    {
        return intval(self::getValue($creatureProfile, 'int'));
    }

    /**
     * Get the wisdom
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return int
     */
    public static function getWisdom(array $creatureProfile): int
    {
        return intval(self::getValue($creatureProfile, 'wis'));
    }

    /**
     * Get the charisma
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return int
     */
    public static function getCharisma(array $creatureProfile): int
    {
        return intval(self::getValue($creatureProfile, 'cha'));
    }

    /**
     * Get the proficiency score
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return int
     */
    public static function getProficiency(array $creatureProfile): int
    {
        return intval(self::getValue($creatureProfile, 'proficiency'));
    }

    /**
     * Get the save proficiencies
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return string[]
     */
    public static function getSaveProficiencies(array $creatureProfile): array
    {
        $value = self::getValue($creatureProfile, 'proficientSaves');
        return self::explodeArrayValue($value);
    }

    /**
     * Get the skill proficiencies
     * 
     * @param string[] $creatureProfile The unpacked creature profile
     * @return string[]
     */
    public static function getSkillProficiencies(array $creatureProfile): array
    {
        $value = self::getValue($creatureProfile, 'proficientSkills');
        return self::explodeArrayValue($value);
    }

    /**
     * Get the specified value from the profile
     * 
     * @param string[] $creatureProfile
     * @param string $index
     * @return string
     */
    private static function getValue(array $creatureProfile, string $index): string
    {
        return $creatureProfile[$index];
    }

    /**
     * Create an array from a value
     * 
     * @param string $value
     * @return array
     */
    private static function explodeArrayValue(string $value): array
    {
        $result = array();
        if (!empty($value)) {
            $result = explode(';', $value);
        }
        return $result;
    }
}