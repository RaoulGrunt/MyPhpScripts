<?php

namespace Framework\RGDND;

/**
 * Damage
 * 
 * The amount of a damage and the damage type
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @version 1.0.0
 */
class Damage
{
    /** @var int $amount The amount of damage */
    private int $amount;
    /** @var string $type The type of damage */
    private string $type;
    
    /**
     * Constructor
     * 
     * Set the class properties
     * 
     * @param int $amount The amount of damage
     * @param string $type The type of damage
     */
    public function __construct(int $amount, string $type)
    {
       $this->setClassProperties($amount, $type);
    }

    /**
     * The amount of damage
     * 
     * @return int
     */
    public function amount(): int
    {
        return $this->amount;
    }

    /**
     * The type of damage
     * 
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }

   /**
    * Set the class properties
    * 
    * @param int $amount The amount of damage
    * @param string $type The type of damage
    */
    private function setClassProperties(int $amount, string $type)
    {
        $this->amount = $amount;
        $this->type = $type;
    }
}