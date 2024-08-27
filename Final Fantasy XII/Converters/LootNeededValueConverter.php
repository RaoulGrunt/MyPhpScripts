<?php

/**
 * Converter class that converts values to sheet text
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.1
 */
class LootNeededValueConverter
{
    /**
     * Convert the specified parameter to the string for a Bazaar sheet cell
     * 
     * @param BazaarLoot[] The loot needed for the bazaar item
     * @return string
     */
    public static function convertToLootString(array $bazaarLoot): string
    {
        $result = '';
        switch (count($bazaarLoot)) {
            case 0;
                break;
            case 1:
                $result = self::convertToLootStringSingle($bazaarLoot);
                break;
            case 2:
                $result = self::convertToLootStringDouble($bazaarLoot);
                break;
            case 3:
                $result = self::convertToLootStringTriple($bazaarLoot);
                break;
            default:
                throw new Exception('LootNeededValueConverter::convertToLootString() - BazaarLoot with more than 3 items found');            
        }
        
        return $result;
    }

    /**
     * Convert the specified parameter to the string for the bazaar sheet cell for a single loot item
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToLootStringSingle(array $bazaarLoot): string
    {
        $bazaarSheetRow = $bazaarLoot[0]->bazaarSheetRow();
        $lootSheetRow = $bazaarLoot[0]->lootSheetRow();
        $lootName = $bazaarLoot[0]->lootName();        
        $lootAmount = $bazaarLoot[0]->amount();
        return '=
                IF(AND(A' . $bazaarSheetRow . ', Loot!A' . $lootSheetRow . '), "", 
                IF(Loot!A' . $lootSheetRow . ', "Sell: ' . $lootName . ' x' . $lootAmount . '", 
                IF(Loot!A' . $lootSheetRow . ' = FALSE, "Collect: ' . $lootName . ' x' . $lootAmount . '", "")))';
    }

    /**
     * Convert the specified parameter to the string for the bazaar sheet cell for two loot items
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToLootStringDouble(array $bazaarLoot): string
    {
        $bazaarSheetRow = $bazaarLoot[0]->bazaarSheetRow();
        $sheetRowFirst = $bazaarLoot[0]->lootSheetRow();
        $lootNameFirst = $bazaarLoot[0]->lootName();
        $lootAmountFirst = $bazaarLoot[0]->amount();
        $sheetRowSecond = $bazaarLoot[1]->lootSheetRow();
        $lootNameSecond = $bazaarLoot[1]->lootName();
        $lootAmountSecond = $bazaarLoot[1]->amount();
        return '=
                IF(AND(A' . $bazaarSheetRow . ', Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . '), "",
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . '), "Sell: ' . $lootNameFirst . ' x' . $lootAmountFirst . ', ' . $lootNameSecond . ' x' . $lootAmountSecond . '", 
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . '), "Collect: ' . $lootNameFirst . ' x' . $lootAmountFirst . '",
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . ' = FALSE), "Collect: ' . $lootNameSecond . ' x' . $lootAmountSecond . '",
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . ' = FALSE), "Collect: ' . $lootNameFirst . ' x' . $lootAmountFirst . ', ' . $lootNameSecond . ' x' . $lootAmountSecond . '")))))';
    }

    /**
     * Convert the specified parameter to the string for the bazaar sheet cell for three loot items
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToLootStringTriple(array $bazaarLoot): string
    {
        $bazaarSheetRow = $bazaarLoot[0]->bazaarSheetRow();
        $sheetRowFirst = $bazaarLoot[0]->lootSheetRow();
        $lootNameFirst = $bazaarLoot[0]->lootName();
        $lootAmountFirst = $bazaarLoot[0]->amount();
        $sheetRowSecond = $bazaarLoot[1]->lootSheetRow();
        $lootNameSecond = $bazaarLoot[1]->lootName();
        $lootAmountSecond = $bazaarLoot[1]->amount();
        $sheetRowThird = $bazaarLoot[2]->lootSheetRow();
        $lootNameThird = $bazaarLoot[2]->lootName();
        $lootAmountThird = $bazaarLoot[2]->amount();
        return '=
                IF(AND(A' . $bazaarSheetRow . ', Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . ', Loot!A' . $sheetRowThird . '),"",
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . ', Loot!A' . $sheetRowThird . '),"Sell: ' . $lootNameFirst . ' x' . $lootAmountFirst . ', ' . $lootNameSecond . ' x' . $lootAmountSecond . ', ' . $lootNameThird . ' x' . $lootAmountThird . '",
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . ', Loot!A' . $sheetRowThird . ' = FALSE), "Collect: ' . $lootNameThird . ' x' . $lootAmountThird . '",
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . ' = FALSE, Loot!A' . $sheetRowThird . '), "Collect: ' . $lootNameSecond . ' x' . $lootAmountSecond . '",
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . ' = FALSE, Loot!A' . $sheetRowThird . ' = FALSE), "Collect: ' . $lootNameSecond . ' x' . $lootAmountSecond . ', ' . $lootNameThird . ' x' . $lootAmountThird . '",
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . ', Loot!A' . $sheetRowThird . '), "Collect: ' . $lootNameFirst . ' x' . $lootAmountFirst . '",
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . ', Loot!A' . $sheetRowThird . ' = FALSE), "Collect: ' . $lootNameFirst . ' x' . $lootAmountFirst . ', ' . $lootNameThird . ' x' . $lootAmountThird . '",
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . ' = FALSE, Loot!A' . $sheetRowThird . '), "Collect: ' . $lootNameFirst . ' x' . $lootAmountFirst . ', ' . $lootNameSecond . ' x' . $lootAmountSecond . '",
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . ' = FALSE, Loot!A' . $sheetRowThird . ' = FALSE), "Collect: ' . $lootNameFirst . ' x' . $lootAmountFirst . ', ' . $lootNameSecond . ' x' . $lootAmountSecond . ', ' . $lootNameThird . ' x' . $lootAmountThird . '")))))))))';
    }
}