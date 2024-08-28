<?php

/**
 * Converter class that converts the BazaarLoot to the SellCheckboxFunction
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.0
 */
class SellCheckboxValueConverter
{
    /**
     * Convert the specified parameter to the string for the "sell" checkbox cell
     * 
     * @param BazaarLoot[] $bazaarLoot The list of array of BazaarLoot
     * @return string
     */
    public static function convertToSellCheckboxString(array $bazaarLoot): string
    {
        $result = '';
        switch (count($bazaarLoot)) {
            case 0:
                break;
            case 1:
                $result = self::convertToSellCheckboxStringSingle($bazaarLoot);
                break;
            case 2:
                $result = self::convertToSellCheckboxStringDouble($bazaarLoot);
                break;
            case 3:
                $result = self::convertToSellCheckboxStringTriple($bazaarLoot);
                break;
            default:
                throw new Exception('SellCheckboxToValueConverter::convertToSellCheckboxString() - BazaarLoot with more than 3 items found');
        }
        return $result;
    }

    /**
     * Convert the specified parameter to the string for the "sell" checkbox cell for a single loot item
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToSellCheckboxStringSingle(array $bazaarLoot): string
    {
        $bazaarSheetRow = $bazaarLoot[0]->bazaarSheetRow();
        $lootSheetRow = $bazaarLoot[0]->lootSheetRow();
        return '=
                IF(AND(A' . $bazaarSheetRow . ' = FALSE, Loot!A' . $lootSheetRow . '), TRUE, FALSE)';
    }

    /**
     * Convert the specified parameter to the string for the "sell" checkbox cell for two loot items
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToSellCheckboxStringDouble(array $bazaarLoot): string
    {
        $bazaarSheetRow = $bazaarLoot[0]->bazaarSheetRow();
        $lootSheetRowFirst = $bazaarLoot[0]->lootSheetRow();
        $lootSheetRowSecond = $bazaarLoot[1]->lootSheetRow();
        return '=
                IF(AND(A' . $bazaarSheetRow . ' = FALSE, Loot!A' . $lootSheetRowFirst . ', Loot!A' . $lootSheetRowSecond  . '), TRUE, FALSE)';
    }

    /**
     * Convert the specified parameter to the string for the "sell" checkbox cell for three loot items
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToSellCheckboxStringTriple(array $bazaarLoot): string
    {
        $bazaarSheetRow = $bazaarLoot[0]->bazaarSheetRow();
        $lootSheetRowFirst = $bazaarLoot[0]->lootSheetRow();
        $lootSheetRowSecond = $bazaarLoot[1]->lootSheetRow();
        $lootSheetRowThird = $bazaarLoot[2]->lootSheetRow();
        return '=
                IF(AND(A' . $bazaarSheetRow . ' = FALSE, Loot!A' . $lootSheetRowFirst . ', Loot!A' . $lootSheetRowSecond  . ', Loot!A' . $lootSheetRowThird . '), TRUE, FALSE)';
    }
}