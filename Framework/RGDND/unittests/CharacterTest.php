<?php 

namespace Framework\RGDND;

require_once __DIR__ . '/../Config/config.php';
require_once FRAMEWORK_RGDND_ROOT . '/Character.php';

use PHPUnit\Framework\TestCase;

/**
 * PHPUnit test class for Character
 */
class CharacterTest extends TestCase
{
    /** @var string $profile The profile to load */
    private string $profile;
    /** @var string[] $unpackedProfile The unpacked profile */
    private array $unpackedProfile;
    /** @var Character $testClass The character object to test */
    private Character $testClass;

    /**
     * Set the class variables
     */
    protected function setUp(): void
    {
        $this->profile = __DIR__ . '/Profiles/TestCharacter';
        $profileReader = ReaderFactory::createProfileReader($this->profile);
        $this->unpackedProfile = $profileReader->profile();
        $this->testClass = new Character($this->profile);
    }

    /**
     * Test if the Character class loads
     */
    public function testLoadCharacter()
    {
        $this->assertEquals('TestChar', $this->testClass->name(), 'Name FAILED: TestChar vs ' . $this->testClass->name());
    }

    /**
     * Test if the Character basics load
     */
    public function testLoadCharacterBasics()
    {
        $testClass = new CreatureBasics($this->unpackedProfile);
        $this->assertEquals('TestChar', $testClass->name(), 'Name FAILED: TestChar vs ' . $testClass->name());
        $this->assertEquals('Human', $testClass->race(), 'Race FAILED: Human vs ' . $testClass->race());
        $this->assertEquals('Neutral', $testClass->alignment(), 'Alignment FAILED: Neutral vs ' . $testClass->alignment());
    }

    /**
     * Test if the Character statistics load
     */
    public function testLoadCharacterStatistics()
    {
        $testClass = new CreatureStatistics($this->unpackedProfile);
        $this->assertEquals(14, $testClass->armorClass(), 'Armor Class FAILED: 14 vs ' . $testClass->armorClass());
        $this->assertEquals(30, $testClass->movementSpeed(), 'Movement Speed FAILED: 30 vs ' . $testClass->movementSpeed());
    }

    /**
     * Test if the Character hitpoints load
     */
    public function testLoadCharacterHitpoints()
    {
        $testClass = new CreatureHitpoints($this->unpackedProfile);
        $this->assertEquals(44, $testClass->maxHitpoints(), 'Max Hitpoints FAILED: 44 vs ' . $testClass->maxHitpoints());
        $this->assertEquals(29, $testClass->currentHitpoints(), 'Current hitpoints FAILED: 29 vs ' . $testClass->currentHitpoints());
    }

    /**
     * Test if the Character ability scores load
     */
    public function testLoadCharacterAbilityScores()
    {
        $testClass = new CreatureAbilityScores($this->unpackedProfile);
        $this->assertEquals(12, $testClass->getScoreFor(ABILITY_STRENGTH), 'Strength score FAILED: 12 vs ' . $testClass->getScoreFor(ABILITY_STRENGTH));
        $this->assertEquals(15, $testClass->getScoreFor(ABILITY_DEXTERITY), 'Dexterity score FAILED: 15 vs ' . $testClass->getScoreFor(ABILITY_DEXTERITY));
        $this->assertEquals(16, $testClass->getScoreFor(ABILITY_CONSTITUTION), 'Constitution score FAILED: 16 vs ' . $testClass->getScoreFor(ABILITY_CONSTITUTION));
        $this->assertEquals(18, $testClass->getScoreFor(ABILITY_INTELLIGENCE), 'Intelligence score FAILED: 18 vs ' . $testClass->getScoreFor(ABILITY_INTELLIGENCE));
        $this->assertEquals(20, $testClass->getScoreFor(ABILITY_WISDOM), 'Wisdom score FAILED: 20 vs ' . $testClass->getScoreFor(ABILITY_WISDOM));
        $this->assertEquals(23, $testClass->getScoreFor(ABILITY_CHARISMA), 'Charisma score FAILED: 23 vs ' . $testClass->getScoreFor(ABILITY_CHARISMA));
    }

    /**
     * Test if the Character ability modifiers load
     */
    public function testLoadCharacterAbilityModifiers()
    {
        $testClass = new CreatureAbilityModifiers($this->unpackedProfile);
        $this->assertEquals(1, $testClass->getScoreFor(MODIFIER_STRENGTH), 'Ability Strength FAILED: 1 vs ' . $testClass->getScoreFor(MODIFIER_STRENGTH));
        $this->assertEquals(2, $testClass->getScoreFor(MODIFIER_DEXTERITY), 'Ability Dexterity FAILED: 2 vs ' . $testClass->getScoreFor(MODIFIER_DEXTERITY));
        $this->assertEquals(3, $testClass->getScoreFor(MODIFIER_CONSTITUTION), 'Ability Constitution FAILED: 3 vs ' . $testClass->getScoreFor(MODIFIER_CONSTITUTION));
        $this->assertEquals(4, $testClass->getScoreFor(MODIFIER_INTELLIGENCE), 'Ability Intelligence FAILED: 4 vs ' . $testClass->getScoreFor(MODIFIER_INTELLIGENCE));
        $this->assertEquals(5, $testClass->getScoreFor(MODIFIER_WISDOM), 'Ability Wisdom FAILED: 5 vs ' . $testClass->getScoreFor(MODIFIER_WISDOM));
        $this->assertEquals(6, $testClass->getScoreFor(MODIFIER_CHARISMA), 'Ability Charisma FAILED: 6 vs ' . $testClass->getScoreFor(MODIFIER_CHARISMA));
    }

    /**
     * Test if the Character saves load
     */
    public function testLoadCharacterSaves()
    {
        $testClass = new CreatureSaves($this->unpackedProfile);
        $this->assertEquals(1, $testClass->getModifierFor(SAVE_STRENGTH), 'Save Strength FAILED: 3 vs ' . $testClass->getModifierFor(SAVE_STRENGTH));
        $this->assertEquals(2, $testClass->getModifierFor(SAVE_DEXTERITY), 'Save Dexterity FAILED: 2 vs ' . $testClass->getModifierFor(SAVE_DEXTERITY));
        $this->assertEquals(3, $testClass->getModifierFor(SAVE_CONSTITUTION), 'Save Constitution FAILED: 1 vs ' . $testClass->getModifierFor(SAVE_CONSTITUTION));
        $this->assertEquals(6, $testClass->getModifierFor(SAVE_INTELLIGENCE), 'Save Intelligence FAILED: 2 vs ' . $testClass->getModifierFor(SAVE_INTELLIGENCE));
        $this->assertEquals(7, $testClass->getModifierFor(SAVE_WISDOM), 'Save Wisdom FAILED: 1 vs ' . $testClass->getModifierFor(SAVE_WISDOM));
        $this->assertEquals(8, $testClass->getModifierFor(SAVE_CHARISMA), 'Save Charisma FAILED: -2 vs ' . $testClass->getModifierFor(SAVE_CHARISMA));
    }

    /**
     * Test if the Character skills load
     */
    public function testLoadCharacterSkills()
    {
        $testClass = new CreatureSkills($this->unpackedProfile);
        $this->assertEquals(4, $testClass->getModifierFor(SKILL_ACROBATICS), 'Skill Acrobatics FAILED: 4 vs ' . $testClass->getModifierFor(SKILL_ACROBATICS));
        $this->assertEquals(7, $testClass->getModifierFor(SKILL_ANIMAL_HANDLING), 'Skill Animal Handling FAILED: 7 vs ' . $testClass->getModifierFor(SKILL_ANIMAL_HANDLING));
        $this->assertEquals(6, $testClass->getModifierFor(SKILL_ARCANA), 'Skill Arcana FAILED: 6 vs ' . $testClass->getModifierFor(SKILL_ARCANA));
        $this->assertEquals(3, $testClass->getModifierFor(SKILL_ATHLETICS), 'Skill Athletics FAILED: 3 vs ' . $testClass->getModifierFor(SKILL_ATHLETICS));
        $this->assertEquals(8, $testClass->getModifierFor(SKILL_DECEPTION), 'Skill Deception FAILED: 8 vs ' . $testClass->getModifierFor(SKILL_DECEPTION));
        $this->assertEquals(6, $testClass->getModifierFor(SKILL_HISTORY), 'Skill History FAILED: 6 vs ' . $testClass->getModifierFor(SKILL_HISTORY));
        $this->assertEquals(7, $testClass->getModifierFor(SKILL_INSIGHT), 'Skill Insight FAILED: 7 vs ' . $testClass->getModifierFor(SKILL_INSIGHT));
        $this->assertEquals(8, $testClass->getModifierFor(SKILL_INTIMIDATION), 'Skill Intimidation FAILED: 8 vs ' . $testClass->getModifierFor(SKILL_INTIMIDATION));
        $this->assertEquals(6, $testClass->getModifierFor(SKILL_INVESTIGATION), 'Skill Investigation FAILED: 6 vs ' . $testClass->getModifierFor(SKILL_INVESTIGATION));
        $this->assertEquals(5, $testClass->getModifierFor(SKILL_MEDICINE), 'Skill Medicine FAILED: 5 vs ' . $testClass->getModifierFor(SKILL_MEDICINE));
        $this->assertEquals(4, $testClass->getModifierFor(SKILL_NATURE), 'Skill Nature FAILED: 4 vs ' . $testClass->getModifierFor(SKILL_NATURE));
        $this->assertEquals(5, $testClass->getModifierFor(SKILL_PERCEPTION), 'Skill Perception FAILED: 5 vs ' . $testClass->getModifierFor(SKILL_PERCEPTION));
        $this->assertEquals(6, $testClass->getModifierFor(SKILL_PERFORMANCE), 'Skill Performance FAILED: 6 vs ' . $testClass->getModifierFor(SKILL_PERFORMANCE));
        $this->assertEquals(6, $testClass->getModifierFor(SKILL_PERSUASSION), 'Skill Persuassion FAILED: 6 vs ' . $testClass->getModifierFor(SKILL_PERSUASSION));
        $this->assertEquals(4, $testClass->getModifierFor(SKILL_RELIGION), 'Skill Religion FAILED: 4 vs ' . $testClass->getModifierFor(SKILL_RELIGION));
        $this->assertEquals(2, $testClass->getModifierFor(SKILL_SLEIGHT_OF_HAND), 'Skill Sleight of Hand FAILED: 2 vs ' . $testClass->getModifierFor(SKILL_SLEIGHT_OF_HAND));
        $this->assertEquals(2, $testClass->getModifierFor(SKILL_STEALTH), 'Skill Stealth FAILED: 2 vs ' . $testClass->getModifierFor(SKILL_STEALTH));
        $this->assertEquals(5, $testClass->getModifierFor(SKILL_SURVIVAL), 'Skill Survival FAILED: 5 vs ' . $testClass->getModifierFor(SKILL_SURVIVAL));
    }

    /**
     * Test if the Character senses load
     */
    public function testLoadSenses()
    {
        $testClass = new CreatureSenses($this->unpackedProfile);
        $this->assertEquals(15, $testClass->getValueFor(SENSE_PERCEPTION), 'Passive Perception FAILED: 15 vs ' . $testClass->getValueFor(SENSE_PERCEPTION));
        $this->assertEquals(16, $testClass->getValueFor(SENSE_INVESTIGATION), 'Passive Investigation FAILED: 16 vs ' . $testClass->getValueFor(SENSE_INVESTIGATION));
        $this->assertEquals(17, $testClass->getValueFor(SENSE_INSIGHT), 'Passive Insight FAILED: 17 vs ' . $testClass->getValueFor(SENSE_INSIGHT));
    }

    /**
     * Test if the initiative roll is correct
     */
    public function testRollInitiative()
    {
        for($i = 0; $i < 200; $i++) {
            $initiative = $this->testClass->rollInitiative();
            $this->assertThat($initiative, $this->logicalAnd($this->greaterThan(2), $this->lessThan(24)), 'Initiative FAILED: 3-23 vs ' . $initiative);
        }
    }
}