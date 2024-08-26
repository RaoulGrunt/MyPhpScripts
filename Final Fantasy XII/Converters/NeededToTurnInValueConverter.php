<?php

/**
 * Converter class that converts loot values to sheet functions
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.0
 */
class NeededToTurnInValueConverter
{
    /**
     * Convert the specified parameter to the string for the "needed to turn in" cell
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    public static function convertToNeededToTurnInString(array $bazaarLoot): string
    {
        $result = '';
        switch (count($bazaarLoot)) {
            case 0:
                break;
            case 1:
                $result = self::convertToNeededToTurnInStringSingle($bazaarLoot);
                break;
            case 2:
                $result = self::convertToNeededToTurnInStringDouble($bazaarLoot);
                break;
            case 3:
                $result = self::convertToNeededToTurnInStringTriple($bazaarLoot);
                break;
            default:
                throw new Exception('NeededToTurnInValueConverter::convertToNeededToTurnInString() - BazaarLoot with more than 3 items found');            
        }
        
        return $result;
    }

    /**
     * Convert the specified parameter to the string for the "needed to turn in" cell for a single loot item
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToNeededToTurnInStringSingle(array $bazaarLoot): string
    {
        $sheetRow = $bazaarLoot[0]->lootSheetRow();
        $lootAmount = $bazaarLoot[0]->amount();
        return '=
                IF(A' . $sheetRow . ', "", 
                IF(A' . $sheetRow . ' = FALSE, "x' . $lootAmount . '", ""))';
    }

    /**
     * Convert the specified parameter to the string for the "needed to turn in" cell for two loot items
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToNeededToTurnInStringDouble(array $bazaarLoot): string
    {
        $sheetRowFirst = $bazaarLoot[0]->lootSheetRow();
        $lootAmountFirst = $bazaarLoot[0]->amount();
        $lootNameSecond = $bazaarLoot[1]->lootName();
        $sheetRowSecond = $bazaarLoot[1]->lootSheetRow();
        $lootAmountSecond = $bazaarLoot[1]->amount();
        return '=
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . '), "", 
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . ' = FALSE), "' . $lootNameSecond . ' x' . $lootAmountSecond . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . '), "x' . $lootAmountFirst . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . ' = FALSE), "x' . $lootAmountFirst . ' + ' . $lootNameSecond . ' x' . $lootAmountSecond . '"))))';
    }

    /**
     * Convert the specified parameter to the string for the "needed to turn in" cell for three loot items
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToNeededToTurnInStringTriple(array $bazaarLoot): string
    {
        $sheetRowFirst = $bazaarLoot[0]->lootSheetRow();
        $lootAmountFirst = $bazaarLoot[0]->amount();
        $lootNameSecond = $bazaarLoot[1]->lootName();
        $sheetRowSecond = $bazaarLoot[1]->lootSheetRow();
        $lootAmountSecond = $bazaarLoot[1]->amount();
        $lootNameThird = $bazaarLoot[2]->lootName();
        $sheetRowThird = $bazaarLoot[2]->lootSheetRow();
        $lootAmountThird = $bazaarLoot[2]->amount();
        return '=
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . ', A' . $sheetRowThird . '), "",
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . ', A' . $sheetRowThird . ' = FALSE), "' . $lootNameThird . ' x' . $lootAmountThird . '",
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . ' = FALSE, A' . $sheetRowThird . '), "' . $lootNameSecond . ' x' . $lootAmountSecond . '",
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . ' = FALSE, A' . $sheetRowThird . ' = FALSE), "' . $lootNameSecond . ' x' . $lootAmountSecond . ', ' . $lootNameThird . ' x' . $lootAmountThird . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . ', A' . $sheetRowThird . '), "x' . $lootAmountFirst . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . ', A' . $sheetRowThird . ' = FALSE), "x' . $lootAmountFirst . ' + ' . $lootNameThird . ' x' . $lootAmountThird . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . ' = FALSE, A' . $sheetRowThird . '), "x' . $lootAmountFirst . ' + ' . $lootNameSecond . ' x' . $lootAmountSecond . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . ' = FALSE, A' . $sheetRowThird . '= FALSE), "x' . $lootAmountFirst . ' + ' . $lootNameSecond . ' x' . $lootAmountSecond . ', ' . $lootNameThird . ' x' . $lootAmountThird . '"))))))))';
    }
}