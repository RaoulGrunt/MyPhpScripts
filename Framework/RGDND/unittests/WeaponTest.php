<?php 

namespace Framework\RGDND;

require_once __DIR__ . '/../Config/config.php';
require_once FRAMEWORK_RGDND_ROOT . '/Weapon.php';

use PHPUnit\Framework\TestCase;

/**
 * PHPUnit test class for Weapon
 */
class WeaponTest extends TestCase
{
    /** @var string $profile The profile to load */
    private string $profile;

    /**
     * Set the class variables
     */
    protected function setUp(): void
    {
        $this->profile = __DIR__ . '/Profiles/TestWeapon';
    }

    /**
     * Test if the Weapon class loads
     */
    public function testLoadWeapon()
    {
        $testClass = new Weapon($this->profile);
        $this->assertEquals('TestWeapon', $testClass->name(), 'Name FAILED: TestWeapon vs ' . $testClass->name());
        $this->assertEquals('This is a unit test weapon', $testClass->description(), 'Description FAILED: This is a unit test weapon vs ' . $testClass->description());
        $this->assertEquals(1, $testClass->cost()->amount(), 'Cost Amount FAILED: 1 vs ' . $testClass->cost()->amount());
        $this->assertEquals('sp', $testClass->cost()->type(), 'Cost Type: sp vs ' . $testClass->cost()->type());
        $this->assertEquals(2, $testClass->weight(), 'Weight FAILED: 2 vs ' . $testClass->weight());
    }

    /**
     * Test if the damage roll is correct
     */
    public function testRollDamage()
    {
        $testClass = new Weapon($this->profile);
        for($i = 0; $i < 40; $i++) {
            $damage = $testClass->rollDamage();
            $this->assertEqualsWithDelta(1, $damage, 3, 'Damage FAILED: 1-4 vs ' . $damage);
        }
    }
}