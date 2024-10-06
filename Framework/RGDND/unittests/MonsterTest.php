<?php 

namespace Framework\RGDND;

require_once __DIR__ . '/../Config/config.php';
require_once FRAMEWORK_RGDND_ROOT . '/Monster.php';

use PHPUnit\Framework\TestCase;

/**
 * PHPUnit test class for Monster
 */
class MonsterTest extends TestCase
{
    /** @var string $profile The profile to load */
    private string $profile;
    /** @var string[] $unpackedProfile The unpacked profile */
    private array $unpackedProfile;

    /**
     * Set the class variables
     */
    protected function setUp(): void
    {
        $this->profile = __DIR__ . '/Profiles/TestMonster';
        $profileReader = ReaderFactory::createProfileReader($this->profile);
        $this->unpackedProfile = $profileReader->profile();
    }

    /**
     * Test if the Monster class loads
     */
    public function testLoadMonster()
    {
        $testClass = new Monster($this->profile);
        $this->assertEquals('TestMonster', $testClass->name(), 'Name FAILED: TestChar vs ' . $testClass->name());
    }

    /**
     * Test if the Monster basics load
     */
    public function testLoadMonsterBasics()
    {
        $testClass = new CreatureBasics($this->unpackedProfile);
        $this->assertEquals('TestMonster', $testClass->name(), 'Name FAILED: TestChar vs ' . $testClass->name());
        $this->assertEquals('Medium humanoid (any race)', $testClass->race(), 'Race FAILED: Human vs ' . $testClass->race());
        $this->assertEquals('Any alignment', $testClass->alignment(), 'Alignment FAILED: Neutral vs ' . $testClass->alignment());
    }

    /**
     * Test if the Monster statistics load
     */
    public function testLoadMonsterStatistics()
    {
        $testClass = new CreatureStatistics($this->unpackedProfile);
        $this->assertEquals(10, $testClass->armorClass(), 'Armor Class FAILED: 10 vs ' . $testClass->armorClass());
        $this->assertEquals(30, $testClass->movementSpeed(), 'Movement Speed FAILED: 30 vs ' . $testClass->movementSpeed());
    }

    /**
     * Test if the Monster hitpoints load
     */
    public function testLoadMonsterHitpoints()
    {
        $testClass = new CreatureHitpoints($this->unpackedProfile);
        $this->assertEqualsWithDelta(1, $testClass->maxHitpoints(), 7, 'Max Hitpoints FAILED: 1-8 vs ' . $testClass->maxHitpoints());
        $this->assertEquals($testClass->maxHitpoints(), $testClass->currentHitpoints(), 'Current Hitpoints FAILED: ' . $testClass->maxHitpoints() . ' vs ' . $testClass->currentHitpoints());
    }

    /**
     * Test if the Monster ability scores load
     */
    public function testLoadMonsterAbilityScores()
    {
        $testClass = new CreatureAbilityScores($this->unpackedProfile);
        $this->assertEquals(1, $testClass->getScoreFor(ABILITY_STRENGTH), 'Strength score FAILED: 1 vs ' . $testClass->getScoreFor(ABILITY_STRENGTH));
        $this->assertEquals(3, $testClass->getScoreFor(ABILITY_DEXTERITY), 'Dexterity score FAILED: 3 vs ' . $testClass->getScoreFor(ABILITY_DEXTERITY));
        $this->assertEquals(4, $testClass->getScoreFor(ABILITY_CONSTITUTION), 'Constitution score FAILED: 4 vs ' . $testClass->getScoreFor(ABILITY_CONSTITUTION));
        $this->assertEquals(7, $testClass->getScoreFor(ABILITY_INTELLIGENCE), 'Intelligence score FAILED: 7 vs ' . $testClass->getScoreFor(ABILITY_INTELLIGENCE));
        $this->assertEquals(8, $testClass->getScoreFor(ABILITY_WISDOM), 'Wisdom score FAILED: 8 vs ' . $testClass->getScoreFor(ABILITY_WISDOM));
        $this->assertEquals(10, $testClass->getScoreFor(ABILITY_CHARISMA), 'Charisma score FAILED: 10 vs ' . $testClass->getScoreFor(ABILITY_CHARISMA));
    }

    /**
     * Test if the Monster ability modifiers load
     */
    public function testLoadMonsterAbilityModifiers()
    {
        $testClass = new CreatureAbilityModifiers($this->unpackedProfile);
        $this->assertEquals(-5, $testClass->getScoreFor(MODIFIER_STRENGTH), 'Ability Strength FAILED: -5 vs ' . $testClass->getScoreFor(MODIFIER_STRENGTH));
        $this->assertEquals(-4, $testClass->getScoreFor(MODIFIER_DEXTERITY), 'Ability Dexterity FAILED: -4 vs ' . $testClass->getScoreFor(MODIFIER_DEXTERITY));
        $this->assertEquals(-3, $testClass->getScoreFor(MODIFIER_CONSTITUTION), 'Ability Constitution FAILED: -3 vs ' . $testClass->getScoreFor(MODIFIER_CONSTITUTION));
        $this->assertEquals(-2, $testClass->getScoreFor(MODIFIER_INTELLIGENCE), 'Ability Intelligence FAILED: -2 vs ' . $testClass->getScoreFor(MODIFIER_INTELLIGENCE));
        $this->assertEquals(-1, $testClass->getScoreFor(MODIFIER_WISDOM), 'Ability Wisdom FAILED: -1 vs ' . $testClass->getScoreFor(MODIFIER_WISDOM));
        $this->assertEquals(0, $testClass->getScoreFor(MODIFIER_CHARISMA), 'Ability Charisma FAILED: 0 vs ' . $testClass->getScoreFor(MODIFIER_CHARISMA));
    }

    /**
     * Test if the Monster saves load
     */
    public function testLoadMonsterSaves()
    {
        $testClass = new CreatureSaves($this->unpackedProfile);
        $this->assertEquals(-3, $testClass->getModifierFor(SAVE_STRENGTH), 'Save Strength FAILED: -3 vs ' . $testClass->getModifierFor(SAVE_STRENGTH));
        $this->assertEquals(-2, $testClass->getModifierFor(SAVE_DEXTERITY), 'Save Dexterity FAILED: -2 vs ' . $testClass->getModifierFor(SAVE_DEXTERITY));
        $this->assertEquals(-1, $testClass->getModifierFor(SAVE_CONSTITUTION), 'Save Constitution FAILED: -1 vs ' . $testClass->getModifierFor(SAVE_CONSTITUTION));
        $this->assertEquals(-2, $testClass->getModifierFor(SAVE_INTELLIGENCE), 'Save Intelligence FAILED: -2 vs ' . $testClass->getModifierFor(SAVE_INTELLIGENCE));
        $this->assertEquals(-1, $testClass->getModifierFor(SAVE_WISDOM), 'Save Wisdom FAILED: -1 vs ' . $testClass->getModifierFor(SAVE_WISDOM));
        $this->assertEquals(0, $testClass->getModifierFor(SAVE_CHARISMA), 'Save Charisma FAILED: 0 vs ' . $testClass->getModifierFor(SAVE_CHARISMA));
    }

    /**
     * Test if the Monster skills load
     */
    public function testLoadMonsterSkills()
    {
        $testClass = new CreatureSkills($this->unpackedProfile);
        $this->assertEquals(-4, $testClass->getModifierFor(SKILL_ACROBATICS), 'Skill Acrobatics FAILED: -4 vs ' . $testClass->getModifierFor(SKILL_ACROBATICS));
        $this->assertEquals(-1, $testClass->getModifierFor(SKILL_ANIMAL_HANDLING), 'Skill Animal Handling FAILED: -1 vs ' . $testClass->getModifierFor(SKILL_ANIMAL_HANDLING));
        $this->assertEquals(-2, $testClass->getModifierFor(SKILL_ARCANA), 'Skill Arcana FAILED: -2 vs ' . $testClass->getModifierFor(SKILL_ARCANA));
        $this->assertEquals(-5, $testClass->getModifierFor(SKILL_ATHLETICS), 'Skill Athletics FAILED: -5 vs ' . $testClass->getModifierFor(SKILL_ATHLETICS));
        $this->assertEquals(0, $testClass->getModifierFor(SKILL_DECEPTION), 'Skill Deception FAILED: -0 vs ' . $testClass->getModifierFor(SKILL_DECEPTION));
        $this->assertEquals(-2, $testClass->getModifierFor(SKILL_HISTORY), 'Skill History FAILED: -2 vs ' . $testClass->getModifierFor(SKILL_HISTORY));
        $this->assertEquals(-1, $testClass->getModifierFor(SKILL_INSIGHT), 'Skill Insight FAILED: -1 vs ' . $testClass->getModifierFor(SKILL_INSIGHT));
        $this->assertEquals(0, $testClass->getModifierFor(SKILL_INTIMIDATION), 'Skill Intimidation FAILED: 0 vs ' . $testClass->getModifierFor(SKILL_INTIMIDATION));
        $this->assertEquals(-2, $testClass->getModifierFor(SKILL_INVESTIGATION), 'Skill Investigation FAILED: -2 vs ' . $testClass->getModifierFor(SKILL_INVESTIGATION));
        $this->assertEquals(1, $testClass->getModifierFor(SKILL_MEDICINE), 'Skill Medicine FAILED: 1 vs ' . $testClass->getModifierFor(SKILL_MEDICINE));
        $this->assertEquals(0, $testClass->getModifierFor(SKILL_NATURE), 'Skill Nature FAILED: 0 vs ' . $testClass->getModifierFor(SKILL_NATURE));
        $this->assertEquals(1, $testClass->getModifierFor(SKILL_PERCEPTION), 'Skill Perception FAILED: 1 vs ' . $testClass->getModifierFor(SKILL_PERCEPTION));
        $this->assertEquals(2, $testClass->getModifierFor(SKILL_PERFORMANCE), 'Skill Performance FAILED: 2 vs ' . $testClass->getModifierFor(SKILL_PERFORMANCE));
        $this->assertEquals(2, $testClass->getModifierFor(SKILL_PERSUASSION), 'Skill Persuassion FAILED: 2 vs ' . $testClass->getModifierFor(SKILL_PERSUASSION));
        $this->assertEquals(0, $testClass->getModifierFor(SKILL_RELIGION), 'Skill Religion FAILED: 0 vs ' . $testClass->getModifierFor(SKILL_RELIGION));
        $this->assertEquals(-2, $testClass->getModifierFor(SKILL_SLEIGHT_OF_HAND), 'Skill Sleight of Hand FAILED: -2 vs ' . $testClass->getModifierFor(SKILL_SLEIGHT_OF_HAND));
        $this->assertEquals(-2, $testClass->getModifierFor(SKILL_STEALTH), 'Skill Stealth FAILED: -2 vs ' . $testClass->getModifierFor(SKILL_STEALTH));
        $this->assertEquals(1, $testClass->getModifierFor(SKILL_SURVIVAL), 'Skill Survival FAILED: 1 vs ' . $testClass->getModifierFor(SKILL_SURVIVAL));
    }

    /**
     * Test if the Monster senses load
     */
    public function testLoadSenses()
    {
        $testClass = new CreatureSenses($this->unpackedProfile);
        $this->assertEquals(11, $testClass->getValueFor(SENSE_PERCEPTION), 'Passive Perception FAILED: 11 vs ' . $testClass->getValueFor(SENSE_PERCEPTION));
        $this->assertEquals(8, $testClass->getValueFor(SENSE_INVESTIGATION), 'Passive Investigation FAILED: 8 vs ' . $testClass->getValueFor(SENSE_INVESTIGATION));
        $this->assertEquals(9, $testClass->getValueFor(SENSE_INSIGHT), 'Passive Insight FAILED: 9 vs ' . $testClass->getValueFor(SENSE_INSIGHT));
    }
}