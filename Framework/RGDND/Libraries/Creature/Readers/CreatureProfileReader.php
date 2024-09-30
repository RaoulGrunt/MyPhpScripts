<?php

namespace Framework\RGDND;

/**
 * CreatureProfileReader
 * 
 * A class to read the profile of creatures
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @version 1.0.0
 */
class CreatureProfileReader
{
    /** The unpacked profile for a creature */
    private array $creatureProfile;

    /**
     * Constructor
     * 
     * Unpack the profile
     * 
     * @param string $characterProfileFile The location of the creature profile to load
     */
    public function __construct(string $creatureProfileFile)
    {
        $this->unpackProfile($creatureProfileFile);
    }

    /**
     * Return the profile loaded into an array
     * 
     * @return array
     */
    public function creatureProfile(): array
    {
        return $this->creatureProfile;
    }

    /**
     * Unpack the specified profile file
     * 
     * @param string $characterProfileFile The location of the creature profile to load
     */
    private function unpackProfile(string $creatureProfileFile)
    {
        $this->validateFile($creatureProfileFile);
        $handle = fopen($creatureProfileFile, 'r');
        $headers = fgetcsv($handle);
        while ( $data = fgetcsv($handle))   {
            $this->creatureProfile = array_combine($headers, $data);
        }
        fclose($handle);
    }

    /**
     * Validate that the file exists
     * 
     * @param string $creatureProfileFile The location of the creature profile to load
     * @throws \Exception
     */
    private function validateFile(string $creatureProfileFile)
    {
        if (!file_exists($creatureProfileFile)) {
            throw new \Exception('ProfileFile "' . $creatureProfileFile . '" does not exist');
        }
    }
}