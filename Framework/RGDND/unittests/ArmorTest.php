<?php 

namespace Framework\RGDND;

require_once __DIR__ . '/../Config/config.php';
require_once FRAMEWORK_RGDND_ROOT . '/Armor.php';

use PHPUnit\Framework\TestCase;

/**
 * PHPUnit test class for Armor
 */
class ArmorTest extends TestCase
{
    /** @var string $profile The profile to load */
    private string $profile;

    /**
     * Set the class variables
     */
    protected function setUp(): void
    {
        $this->profile = __DIR__ . '/Profiles/TestArmor';
    }

    /**
     * Test if the Armor class loads
     */
    public function testLoadArmor()
    {
        $testClass = new Armor($this->profile);
        $this->assertEquals('TestArmor', $testClass->name(), 'Name FAILED: TestArmor vs ' . $testClass->name());
        $this->assertEquals('This is a unit test armor', $testClass->description(), 'Description FAILED: This is a unit test armor vs ' . $testClass->description());
        $this->assertEquals(5, $testClass->cost()->amount(), 'Cost Amount FAILED: 5 vs ' . $testClass->cost()->amount());
        $this->assertEquals('gp', $testClass->cost()->type(), 'Cost Type: gp vs ' . $testClass->cost()->type());
        $this->assertEquals(8, $testClass->weight(), 'Weight FAILED: 8 vs ' . $testClass->weight());
        $this->assertEquals('at_light', $testClass->type(), 'Type FAILED: at_light vs ' . $testClass->type());
        $this->assertEquals(11, $testClass->armorClass(), 'Armor Class FAILED: 11 vs ' . $testClass->armorClass());
        $this->assertEquals(99, $testClass->maxAddedDexModifier(), 'Max Added Dex Modifier FAILED: 99 vs ' . $testClass->maxAddedDexModifier());
        $this->assertEquals(0, $testClass->strengthRequirement(), 'Strength Requirement FAILED: 0 vs ' . $testClass->strengthRequirement());
        $this->assertTrue($testClass->stealthDisadvantage(), 'StealthDisadvantage failed');
    }
}