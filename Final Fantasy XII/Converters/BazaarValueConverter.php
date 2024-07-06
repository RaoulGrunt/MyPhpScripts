<?php

/**
 * Converter class that converts values to sheet text
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.0
 */
class BazaarValueConverter
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
        if (count($bazaarLoot) == 1) {
            $result = self::convertToLootStringSingle($bazaarLoot);
        } elseif (count($bazaarLoot) == 2) {
            $result = self::convertToLootStringDouble($bazaarLoot);
        } elseif (count($bazaarLoot) == 3) {
            $result = self::convertToLootStringTriple($bazaarLoot);
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
        $lootName = $bazaarLoot[0]->lootName();
        $sheetRow = $bazaarLoot[0]->sheetRow();
        $lootAmount = $bazaarLoot[0]->amount();
        return '=
                IF(Loot!A' . $sheetRow . ', "", 
                IF(Loot!A' . $sheetRow . ' = FALSE, "' . $lootName . ' x' . $lootAmount . '", ""))';
    }

    /**
     * Convert the specified parameter to the string for the bazaar sheet cell for two loot items
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToLootStringDouble(array $bazaarLoot): string
    {
        $lootNameFirst = $bazaarLoot[0]->lootName();
        $sheetRowFirst = $bazaarLoot[0]->sheetRow();
        $lootAmountFirst = $bazaarLoot[0]->amount();
        $lootNameSecond = $bazaarLoot[1]->lootName();
        $sheetRowSecond = $bazaarLoot[1]->sheetRow();
        $lootAmountSecond = $bazaarLoot[1]->amount();
        return '=
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . '), "", 
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . '), "' . $lootNameFirst . ' x' . $lootAmountFirst . '",
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . ' = FALSE), "' . $lootNameSecond . ' x' . $lootAmountSecond . '",
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . ' = FALSE), "' . $lootNameFirst . ' x' . $lootAmountFirst . ', ' . $lootNameSecond . ' x' . $lootAmountSecond . '"))))';
    }

    /**
     * Convert the specified parameter to the string for the bazaar sheet cell for three loot items
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToLootStringTriple(array $bazaarLoot): string
    {
        $lootNameFirst = $bazaarLoot[0]->lootName();
        $sheetRowFirst = $bazaarLoot[0]->sheetRow();
        $lootAmountFirst = $bazaarLoot[0]->amount();
        $lootNameSecond = $bazaarLoot[1]->lootName();
        $sheetRowSecond = $bazaarLoot[1]->sheetRow();
        $lootAmountSecond = $bazaarLoot[1]->amount();
        $lootNameThird = $bazaarLoot[2]->lootName();
        $sheetRowThird = $bazaarLoot[2]->sheetRow();
        $lootAmountThird = $bazaarLoot[2]->amount();
        return '=
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . ', Loot!A' . $sheetRowThird . '),"",
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . ', Loot!A' . $sheetRowThird . ' = FALSE), "' . $lootNameThird . ' x' . $lootAmountThird . '",
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . ' = FALSE, Loot!A' . $sheetRowThird . '), "' . $lootNameSecond . ' x' . $lootAmountSecond . '",
                IF(AND(Loot!A' . $sheetRowFirst . ', Loot!A' . $sheetRowSecond . ' = FALSE, Loot!A' . $sheetRowThird . ' = FALSE), "' . $lootNameSecond . ' x' . $lootAmountSecond . ', ' . $lootNameThird . ' x' . $lootAmountThird . '",
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . ', Loot!A' . $sheetRowThird . '), "' . $lootNameFirst . ' x' . $lootAmountFirst . '",
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . ', Loot!A' . $sheetRowThird . ' = FALSE), "' . $lootNameFirst . ' x' . $lootAmountFirst . ', ' . $lootNameThird . ' x' . $lootAmountThird . '",
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . ' = FALSE, Loot!A' . $sheetRowThird . '), "' . $lootNameFirst . ' x' . $lootAmountFirst . ', ' . $lootNameSecond . ' x' . $lootAmountSecond . '",
                IF(AND(Loot!A' . $sheetRowFirst . ' = FALSE, Loot!A' . $sheetRowSecond . ' = FALSE, Loot!A' . $sheetRowThird . '=FALSE), "' . $lootNameFirst . ' x' . $lootAmountFirst . ', ' . $lootNameSecond . ' x' . $lootAmountSecond . ', ' . $lootNameThird . ' x' . $lootAmountThird . '"))))))))';
    }
}