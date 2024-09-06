<?php

/**
 * Converter class that converts the BazaarLoot to the SellUpToFunction
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.1
 */
class SellUpToValueConverter
{
    /**
     * Convert the specified parameter to the string for the "sell up to" cell
     * 
     * @param BazaarLoot[][] $bazaarLoot The list of array of BazaarLoot
     * @return string
     */
    public static function convertToSellUpToString(array $bazaarLoot): string
    {
        $result = '';
        switch (count($bazaarLoot)) {
            case 0:
                $result = '1';
                break;
            case 1:
                $result = self::convertToSellUpToStringSingle($bazaarLoot);
                break;
            case 2:
                $result = self::convertToSellUpToStringDouble($bazaarLoot);
                break;
            case 3:
                $result = self::convertToSellUpToStringTriple($bazaarLoot);
                break;
            case 4:
                $result = self::convertToSellUpToStringQuadruple($bazaarLoot);
                break;
            case 5:
                $result = self::convertToSellUpToStringQuintuple($bazaarLoot);
                break;
            default:
                throw new Exception('SellUpToValueConverter::convertToSellUpToString() - BazaarLoot with more than 5 items found');
        }
        return $result;
    }

    /**
     * Convert the specified parameter to the string for the "sell up to" cell for a single loot item
     * 
     * @param BazaarLoot[][] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToSellUpToStringSingle(array $bazaarLoot): string
    {
        $sheetRow = $bazaarLoot[0][0]->bazaarSheetRow();
        $lootAmount = $bazaarLoot[0][0]->amount();
        $lootMultiply = $bazaarLoot[0][0]->multiply();
        return '=
                IF(Bazaar!A' . $sheetRow . ', "1", 
                IF(Bazaar!A' . $sheetRow . ' = FALSE, "' . 1 + $lootAmount * $lootMultiply . '", ""))';
    }

    /**
     * Convert the specified parameter to the string for the "sell up to" cell for two loot items
     * 
     * @param BazaarLoot[][] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToSellUpToStringDouble(array $bazaarLoot): string
    {
        $sheetRowFirst = $bazaarLoot[0][0]->bazaarSheetRow();
        $lootAmountFirst = $bazaarLoot[0][0]->amount();
        $lootMultiplyFirst = $bazaarLoot[0][0]->multiply();
        $sheetRowSecond = $bazaarLoot[1][0]->bazaarSheetRow();
        $lootAmountSecond = $bazaarLoot[1][0]->amount();
        $lootMultiplySecond = $bazaarLoot[1][0]->multiply();
        return '=
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . '), "1", 
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE), "' . 1 + $lootAmountSecond * $lootMultiplySecond . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond . '"))))';
    }

    /**
     * Convert the specified parameter to the string for the "sell up to" cell for three loot items
     * 
     * @param BazaarLoot[][] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToSellUpToStringTriple(array $bazaarLoot): string
    {
        $sheetRowFirst = $bazaarLoot[0][0]->bazaarSheetRow();
        $lootAmountFirst = $bazaarLoot[0][0]->amount();
        $lootMultiplyFirst = $bazaarLoot[0][0]->multiply();
        $sheetRowSecond = $bazaarLoot[1][0]->bazaarSheetRow();
        $lootAmountSecond = $bazaarLoot[1][0]->amount();
        $lootMultiplySecond = $bazaarLoot[1][0]->multiply();
        $sheetRowThird = $bazaarLoot[2][0]->bazaarSheetRow();
        $lootAmountThird = $bazaarLoot[2][0]->amount();
        $lootMultiplyThird = $bazaarLoot[2][0]->multiply();
        return '=
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . '), "1",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE), "' . 1 + $lootAmountThird * $lootMultiplyThird . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . '), "' . 1 + $lootAmountSecond * $lootMultiplySecond . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE), "' . 1 + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountThird * $lootMultiplyThird . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . '= FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird . '"))))))))';
    }

    /**
     * Convert the specified parameter to the string for the "sell up to" cell for four loot items
     * 
     * @param BazaarLoot[][] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToSellUpToStringQuadruple(array $bazaarLoot): string
    {
        $sheetRowFirst = $bazaarLoot[0][0]->bazaarSheetRow();
        $lootAmountFirst = $bazaarLoot[0][0]->amount();
        $lootMultiplyFirst = $bazaarLoot[0][0]->multiply();
        $sheetRowSecond = $bazaarLoot[1][0]->bazaarSheetRow();
        $lootAmountSecond = $bazaarLoot[1][0]->amount();
        $lootMultiplySecond = $bazaarLoot[1][0]->multiply();
        $sheetRowThird = $bazaarLoot[2][0]->bazaarSheetRow();
        $lootAmountThird = $bazaarLoot[2][0]->amount();
        $lootMultiplyThird = $bazaarLoot[2][0]->multiply();
        $sheetRowFourth = $bazaarLoot[3][0]->bazaarSheetRow();
        $lootAmountFourth = $bazaarLoot[3][0]->amount();
        $lootMultiplyFourth = $bazaarLoot[3][0]->multiply();
        return '=
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . '), "1",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE), "' . 1 + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . '), "' . 1 + $lootAmountThird * $lootMultiplyThird . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . '), "' . 1 + $lootAmountSecond * $lootMultiplySecond . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE), "' . 1 + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE), "' . 1 + $lootAmountSecond * $lootMultiplySecond + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . '), "' . 1 + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE), "' . 1 + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountThird * $lootMultiplyThird . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth . '"))))))))))))))))';
    }

    /**
     * Convert the specified parameter to the string for the "sell up to" cell for five loot items
     * 
     * @param BazaarLoot[][] The loot needed for a bazaar item
     * @return string
     */
    private static function convertToSellUpToStringQuintuple(array $bazaarLoot): string
    {
        $sheetRowFirst = $bazaarLoot[0][0]->bazaarSheetRow();
        $lootAmountFirst = $bazaarLoot[0][0]->amount();
        $lootMultiplyFirst = $bazaarLoot[0][0]->multiply();
        $sheetRowSecond = $bazaarLoot[1][0]->bazaarSheetRow();
        $lootAmountSecond = $bazaarLoot[1][0]->amount();
        $lootMultiplySecond = $bazaarLoot[1][0]->multiply();
        $sheetRowThird = $bazaarLoot[2][0]->bazaarSheetRow();
        $lootAmountThird = $bazaarLoot[2][0]->amount();
        $lootMultiplyThird = $bazaarLoot[2][0]->multiply();
        $sheetRowFourth = $bazaarLoot[3][0]->bazaarSheetRow();
        $lootAmountFourth = $bazaarLoot[3][0]->amount();
        $lootMultiplyFourth = $bazaarLoot[3][0]->multiply();
        $sheetRowFifth = $bazaarLoot[4][0]->bazaarSheetRow();
        $lootAmountFifth = $bazaarLoot[4][0]->amount();
        $lootMultiplyFifth = $bazaarLoot[3][0]->multiply();
        return '=
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . '), "1",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountThird * $lootMultiplyThird . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountSecond * $lootMultiplySecond . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountFourth * $lootMultiplyFourth + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountThird * $lootMultiplyThird + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountSecond * $lootMultiplySecond + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountSecond * $lootMultiplySecond + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountSecond * $lootMultiplySecond + $lootAmountFourth * $lootMultiplyFourth + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird + $lootAmountFifth * $lootMultiplyFifth. '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth . '",                
                IF(AND(Bazaar!A' . $sheetRowFirst . ', Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst+ $lootAmountThird * $lootMultiplyThird . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountFourth * $lootMultiplyFourth + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountThird * $lootMultiplyThird + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond + $lootAmountFourth * $lootMultiplyFourth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ', Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ', Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond + $lootAmountFourth * $lootMultiplyFourth + $lootAmountFifth * $lootMultiplyFifth . '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ', Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird + $lootAmountFifth * $lootMultiplyFifth. '",
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . '), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth . '",                
                IF(AND(Bazaar!A' . $sheetRowFirst . ' = FALSE, Bazaar!A' . $sheetRowSecond . ' = FALSE, Bazaar!A' . $sheetRowThird . ' = FALSE, Bazaar!A' . $sheetRowFourth . ' = FALSE, Bazaar!A' . $sheetRowFifth . ' = FALSE), "' . 1 + $lootAmountFirst * $lootMultiplyFirst + $lootAmountSecond * $lootMultiplySecond + $lootAmountThird * $lootMultiplyThird + $lootAmountFourth * $lootMultiplyFourth + $lootAmountFifth * $lootMultiplyFifth . '"))))))))))))))))))))))))))))))))';
    }
}