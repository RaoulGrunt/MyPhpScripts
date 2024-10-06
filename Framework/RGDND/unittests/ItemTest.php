<?php 

namespace Framework\RGDND;

require_once __DIR__ . '/../Config/config.php';
require_once FRAMEWORK_RGDND_ROOT . '/Item.php';

use PHPUnit\Framework\TestCase;

/**
 * PHPUnit test class for Item
 */
class ItemTest extends TestCase
{
    /** @var string $profile The profile to load */
    private string $profile;

    /**
     * Set the class variables
     */
    protected function setUp(): void
    {
        $this->profile = __DIR__ . '/Profiles/TestItem';
    }

    /**
     * Test if the Item class loads
     */
    public function testLoadItem()
    {
        $testClass = new Item($this->profile);
        $this->assertEquals('TestItem', $testClass->name(), 'Name FAILED: TestItem vs ' . $testClass->name());
        $this->assertEquals('This is a unit test item', $testClass->description(), 'Description FAILED: This is a unit test item vs ' . $testClass->description());
        $this->assertEquals(1, $testClass->cost()->amount(), 'Cost Amount FAILED: 1 vs ' . $testClass->cost()->amount());
        $this->assertEquals('gp', $testClass->cost()->type(), 'Cost Type: gp vs ' . $testClass->cost()->type());
        $this->assertEquals(10, $testClass->weight(), 'Weight FAILED: 10 vs ' . $testClass->weight());
    }
}