<?php

namespace Framework\RGDND;

require_once FRAMEWORK_RGDND_CREATURE_PERFORMERS . '/CreatureSavePerformer.php';
require_once FRAMEWORK_RGDND_CREATURE_PERFORMERS . '/CreatureSkillPerformer.php';

/**
 * PerformerFactory
 * 
 * Class that creates performer objects
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @uses CreatureSavePerformer 1.0.0
 * @uses CreatureSkillPerformer 1.0.0
 * @version 1.0.0
 */
class PerformerFactory
{
    /**
     * Create a CreatureSavesPerformer object
     * 
     * @param string[] $creatureProfile The profile to create the object from
     * @return CreatureSavePerformer
     */
    public static function createCreatureSavePerformer(array $creatureProfile): CreatureSavePerformer
    {
        return new CreatureSavePerformer($creatureProfile);
    }
    
    /**
     * Create a CreatureSkillPerformer object
     * 
     * @param string[] $creatureProfile The profile to create the object from
     * @return CreatureSkillPerformer
     */
    public static function createCreatureSkillPerformer(array $creatureProfile): CreatureSkillPerformer
    {
        return new CreatureSkillPerformer($creatureProfile);
    }
}