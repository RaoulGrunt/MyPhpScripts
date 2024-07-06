<?php

/**
 * HandlerBase
 * 
 * Base class for handler classes
 * 
 * @author Raoul de Grunt
 * @package Final Fantasy XII
 * @version 1.0.0
 */
abstract class HandlerBase
{
    /**
     * Get the output for the specified list
     * 
     * @param string[] $list
     */
    protected function getOutput(array $list): array
    {
        $result = array();
        foreach ($list as $element) {
            $result[] = $this->getOutputFor($element);
        }
        return $result;
    }

    /**
     * Abstract function to get the outpot for the specified element
     * 
     * @param string $elementName
     * @return OutputBase
     */
    abstract protected function getOutputFor(string $elementName): OutputBase;
}