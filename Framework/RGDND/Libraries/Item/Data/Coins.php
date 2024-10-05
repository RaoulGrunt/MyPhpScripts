<?php

namespace Framework\RGDND;

/**
 * Coins
 * 
 * The amount of a coin type
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @version 1.0.0
 */
class Coins
{
    /** @var int $amount The amount of coins */
    private int $amount;
    /** @var string $type The type of coins */
    private string $type;
    
    /**
     * Constructor
     * 
     * Load the basics from the specified profile
     * 
     * @param int $amount The amount of coins
     * @param string $type The type of coins
     */
    public function __construct(int $amount, string $type)
    {
       $this->setClassProperties($amount, $type);
    }

    /**
     * The amount of coins
     * 
     * @return int
     */
    public function amount(): int
    {
        return $this->amount;
    }

    /**
     * The type of coins
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
    * @param int $amount The amount of coins
    * @param string $type The type of coins
    */
    private function setClassProperties(int $amount, string $type)
    {
        $this->amount = $amount;
        $this->type = $type;
    }
}