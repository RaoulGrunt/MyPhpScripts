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
        $this->assertEquals(WEAPON_TYPE_SIMPLE, $testClass->type(), 'Weapon Type: ' . WEAPON_TYPE_SIMPLE . ' vs ' . $testClass->type());
        $this->assertEquals(1, count($testClass->properties()), 'Number of weapon properties FAILED: 1 vs ' . count($testClass->properties()));
        $this->assertEquals(WEAPON_PROPERTY_LIGHT, $testClass->properties()[0], 'Weapon property FAILED: ' . WEAPON_PROPERTY_LIGHT . ' vs ' . $testClass->properties()[0]);
    }

    /**
     * Test if the damage roll is correct
     */
    public function testRollDamage()
    {
        $testClass = new Weapon($this->profile);
        for($i = 0; $i < 40; $i++) {
            $damage = $testClass->rollDamage();
            $this->assertThat($damage->amount(), $this->logicalAnd($this->greaterThan(0), $this->lessThan(5)), 'Damage FAILED: 1-4 vs ' . $damage->amount());
            $this->assertEquals(DAMAGE_TYPE_BLUDGEONING, $damage->type(), 'Damage Type: ' . DAMAGE_TYPE_BLUDGEONING . ' vs ' . $damage->type());
        }
    }
}