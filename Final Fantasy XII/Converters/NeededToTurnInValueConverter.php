<?php

/**
 * Converter class that converts loot values to sheet functions
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.1
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
        return '=
                IF(A' . $sheetRow . ', "", "' . self::constructCellText($bazaarLoot, array(0)) . '")';
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
        $sheetRowSecond = $bazaarLoot[1]->lootSheetRow();
        return '=
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . '), "", 
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . ' = FALSE), "' . self::constructCellText($bazaarLoot, array(1)) . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . '), "' . self::constructCellText($bazaarLoot, array(0)) . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . ' = FALSE), "' . self::constructCellText($bazaarLoot, array(0, 1)) . '"))))';
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
        $sheetRowSecond = $bazaarLoot[1]->lootSheetRow();
        $sheetRowThird = $bazaarLoot[2]->lootSheetRow();
        return '=
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . ', A' . $sheetRowThird . '), "",
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . ', A' . $sheetRowThird . ' = FALSE), "' . self::constructCellText($bazaarLoot, array(2)) . '",
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . ' = FALSE, A' . $sheetRowThird . '), "' . self::constructCellText($bazaarLoot, array(1)) . '",
                IF(AND(A' . $sheetRowFirst . ', A' . $sheetRowSecond . ' = FALSE, A' . $sheetRowThird . ' = FALSE), "' . self::constructCellText($bazaarLoot, array(1, 2)) . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . ', A' . $sheetRowThird . '), "' . self::constructCellText($bazaarLoot, array(0)) . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . ', A' . $sheetRowThird . ' = FALSE), "' . self::constructCellText($bazaarLoot, array(0, 2)) . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . ' = FALSE, A' . $sheetRowThird . '), "' . self::constructCellText($bazaarLoot, array(0, 1)) . '",
                IF(AND(A' . $sheetRowFirst . ' = FALSE, A' . $sheetRowSecond . ' = FALSE, A' . $sheetRowThird . ' = FALSE), "' . self::constructCellText($bazaarLoot, array(0, 1, 2)) . '"))))))))';
    }

    /**
     * Construct the text that will be placed in the cell
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @param array The indices that apply to the result
     * @return string
     */
    private static function constructCellText(array $bazaarLoot, array $indices): string
    {
        $initialLootArray = self::getInitialLootArray($bazaarLoot, $indices);
        $additionalLootArray = self::getAdditionalLootArray($bazaarLoot, $indices);
        $result = self::combineToString($initialLootArray, $additionalLootArray);
        return self::addMultiplyIfNeeded($result, $bazaarLoot);
    }

    /**
     * Get the array with the string for the initial loot, if present
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @param array The indices that apply to the result
     * @return string[]
     */
    private static function getInitialLootArray(array $bazaarLoot, array $indices): array
    {
        if (!in_array(0, $indices)) {
            return array();
        }
        return array('x' . $bazaarLoot[0]->amount());
    }

    /**
     * Get the array with the strings for the additional loot, if present
     * 
     * @param BazaarLoot[] The loot needed for a bazaar item
     * @param array The indices that apply to the result
     * @return string[]
     */
    private static function getAdditionalLootArray(array $bazaarLoot, array $indices): array
    {
        $result = array();
        foreach ($indices as $index) {
            if ($index == 0) {
                continue;
            }
            $result[] = $bazaarLoot[$index]->lootName() . ' x' . $bazaarLoot[$index]->amount();            
        }
        return $result;
    }

    /**
     * Combine the specified arrays into the cell text
     * 
     * @param array $initialLootArray
     * @param array $additionalLootArray
     * @return string
     */
    private static function combineToString(array $initialLootArray, array $additionalLootArray): string
    {
        if (!empty($additionalLootArray)) {
            $initialLootArray[] = implode(', ', $additionalLootArray);
        }
        return implode(' + ', $initialLootArray);
    }

    /**
     * Add multiply text if it is needed
     * 
     * @param string $result
     * @param array $bazaarLoot
     * @return string
     */
    private static function addMultiplyIfNeeded(string $result, array $bazaarLoot): string
    {
        if ($bazaarLoot[0]->multiply() == 1) {
            return $result;
        }        
        return $result . ' * ' . $bazaarLoot[0]->multiply();
    }
}