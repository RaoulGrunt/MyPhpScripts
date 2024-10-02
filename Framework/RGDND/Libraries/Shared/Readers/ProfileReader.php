<?php

namespace Framework\RGDND;

/**
 * ProfileReader
 * 
 * A class to read the profile files
 *
 * @author Raoul de Grunt
 * @package Framework\RGgames
 * @version 1.0.0
 */
class ProfileReader
{
    /** The unpacked profile */
    private array $profile;

    /**
     * Constructor
     * 
     * Unpack the profile
     * 
     * @param string $profileFile The location of the profile to load
     */
    public function __construct(string $profileFile)
    {
        $this->unpackProfile($profileFile);
    }

    /**
     * Return the profile loaded into an array
     * 
     * @return array
     */
    public function profile(): array
    {
        return $this->profile;
    }

    /**
     * Unpack the profile file
     * 
     * @param string $profileFile The location of the profile to load
     */
    private function unpackProfile(string $profileFile)
    {
        $this->validateFile($profileFile);
        $handle = fopen($profileFile, 'r');
        $headers = fgetcsv($handle);
        while ( $data = fgetcsv($handle))   {
            $this->profile = array_combine($headers, $data);
        }
        fclose($handle);
    }

    /**
     * Validate that the file exists
     * 
     * @param string $profileFile The location of the profile to load
     * @throws \Exception
     */
    private function validateFile(string $profileFile)
    {
        if (!file_exists($profileFile)) {
            throw new \Exception('ProfileFile "' . $profileFile . '" does not exist');
        }
    }
}