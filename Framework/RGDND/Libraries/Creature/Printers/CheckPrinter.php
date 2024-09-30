<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_CONFIG . '/config_mappings.php';

/**
 * CheckPrinter
 * 
 * Class that prints the character sheet
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @version 1.0.0
 */
class CheckPrinter
{
    /**
     * Print the save check with the specified result
     * 
     * @param string $save The save that was performed
     * @param int $checkValue The value that was rolled
     * @param int $dc The difficulty class of the check
     * @param bool $result The result
     */
    public static function printSaveCheck(string $save, int $checkValue, int $dc, bool $result)
    {
        $resultString = $result ? 'SUCCESS' : 'FAIL';
        $saveText = unserialize(SAVE_TEXT)[$save];
        print('Performing a ' . $saveText . ' save: ' . $checkValue . ' vs DC ' . $dc . ' (' . $resultString . ')' . PHP_EOL);
    }

    /**
     * Print the skill check with the specified result
     * 
     * @param string $skill The skill that was performed
     * @param int $checkValue The value that was rolled
     * @param int $dc The difficulty class of the check
     * @param bool $result The result
     */
    public static function printSkillCheck(string $skill, int $checkValue, int $dc, bool $result)
    {
        $resultString = $result ? 'SUCCESS' : 'FAIL';
        $skillText = unserialize(SKILLS_TEXT)[$skill];
        print('Performing a ' . $skillText . ' check: ' . $checkValue . ' vs DC ' . $dc . ' (' . $resultString . ')' . PHP_EOL);
    }
}