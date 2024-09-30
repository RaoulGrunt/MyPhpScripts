<?php

define('SAVES_ABILITY', serialize(array(SAVE_STRENGTH => 'str_mod',
                                        SAVE_DEXTERITY => 'dex_mod',
                                        SAVE_CONSTITUTION => 'con_mod',
                                        SAVE_INTELLIGENCE => 'int_mod',
                                        SAVE_WISDOM => 'wis_mod',
                                        SAVE_CHARISMA => 'cha_mod')));

define('SENSES_ABILITY', serialize(array(SKILL_INSIGHT => 'wis_mod',
                                         SKILL_INVESTIGATION => 'int_mod',
                                         SKILL_PERCEPTION => 'wis_mod')));

define('SKILLS_ABILITY', serialize(array(SKILL_ACROBATICS => 'dex_mod',
                                         SKILL_ANIMAL_HANDLING => 'wis_mod',
                                         SKILL_ARCANA => 'int_mod',
                                         SKILL_ATHLETICS => 'str_mod',
                                         SKILL_DECEPTION => 'cha_mod',
                                         SKILL_HISTORY => 'int_mod',
                                         SKILL_INSIGHT => 'wis_mod',
                                         SKILL_INTIMIDATION => 'cha_mod',
                                         SKILL_INVESTIGATION => 'int_mod',
                                         SKILL_MEDICINE => 'wis_mod',
                                         SKILL_NATURE => 'int_mod',
                                         SKILL_PERCEPTION => 'wis_mod',
                                         SKILL_PERFORMANCE => 'cha_mod',
                                         SKILL_PERSUASSION => 'cha_mod',
                                         SKILL_RELIGION => 'int_mod',
                                         SKILL_SLEIGHT_OF_HAND => 'dex_mod',
                                         SKILL_STEALTH => 'dex_mod',
                                         SKILL_SURVIVAL => 'wis_mod')));

define('SKILLS_TEXT', serialize(array(SKILL_ACROBATICS => 'Acrobatics',
                                      SKILL_ANIMAL_HANDLING => 'Animal Handling',
                                      SKILL_ARCANA => 'Arcana',
                                      SKILL_ATHLETICS => 'Athletics',
                                      SKILL_DECEPTION => 'Deception',
                                      SKILL_HISTORY => 'History',
                                      SKILL_INSIGHT => 'Insight',
                                      SKILL_INTIMIDATION => 'Intimidation',
                                      SKILL_INVESTIGATION => 'Investigation',
                                      SKILL_MEDICINE => 'Medicine',
                                      SKILL_NATURE => 'Nature',
                                      SKILL_PERCEPTION => 'Perception',
                                      SKILL_PERFORMANCE => 'Performance',
                                      SKILL_PERSUASSION => 'Persuassion',
                                      SKILL_RELIGION => 'Religion',
                                      SKILL_SLEIGHT_OF_HAND => 'Sleight of Hand',
                                      SKILL_STEALTH => 'Stealth',
                                      SKILL_SURVIVAL => 'Survival')));

define('SAVE_TEXT', serialize(array(SAVE_STRENGTH => 'Strength',
                                    SAVE_DEXTERITY => 'Dexterity',
                                    SAVE_CONSTITUTION => 'Constitution',
                                    SAVE_INTELLIGENCE => 'Intelligence',
                                    SAVE_WISDOM => 'Wisdom',
                                    SAVE_CHARISMA => 'Charisma')));
                                    