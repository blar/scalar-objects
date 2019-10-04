<?php

namespace Blar\ScalarObjects;

use PHPUnit\Framework\TestCase;

class StringHandlerTest extends TestCase {

    public function testBefore() {
        $this->assertSame(
            'test',
            'test@example.com'->before('@')
        );
    }

    public function testReplace() {
        $this->assertSame(
            'fOObar',
            'foobar'->replace('o', 'O')
        );

        $this->assertSame(
            'fOObAr',
            'foobar'->replace([
                'o' => 'O',
                'a' => 'A'
            ])
        );

        $this->assertSame(
            'fOObAr',
            'foobar'->replace('#[aeiou]#', function($match) {
                return $match[0]->uppercase();
            })
        );
    }

    public function testUppercaseFirst() {
        $this->assertSame(
            'Foo bar',
            'foo bar'->uppercaseFirst()
        );
    }

    public function testRemoveSuffix() {
        $this->assertSame(
            'explorer',
            'explorer.exe'->removeSuffix('.exe')
        );

        $this->assertSame(
            'explorer.com',
            'explorer.com'->removeSuffix('.exe')
        );
    }

    public function testFormat() {
        $this->assertSame(
            'foo 42 bar',
            'foo %u bar'->format(42)
        );
    }

    public function testAfter() {
        $this->assertSame(
            '@example.com',
            'test@example.com'->after('@')
        );
    }

    public function testSplit() {
        $this->assertSame(
            ['test', 'example.com'],
            'test@example.com'->split('@')
        );
    }

    public function testCountWords() {
        $this->assertSame(
            3,
            'foo bar foobar'->countWords()
        );
    }

    public function testUppercase() {
        $this->assertSame(
            'FOOBAR',
            'foobar'->uppercase()
        );
    }

    public function testAddPrefix() {
        $this->assertSame(
            'temp_foobar',
            'foobar'->addPrefix('temp_')
        );

        $this->assertSame(
            'temp_foobar',
            'temp_foobar'->addPrefix('temp_')
        );
    }

    public function testRepeat() {
        $this->assertSame(
            'foofoofoo',
            'foo'->repeat(3)
        );
    }

    public function testUppercaseWords() {
        $this->assertSame(
            'Foo Bar',
            'foo bar'->uppercaseWords()
        );
    }

    public function testPosition() {
        $this->assertSame(
            4,
            'foo bar'->position('b')
        );
    }

    public function testLowercaseFirst() {
        $this->assertSame(
            'fOOBAR',
            'FOOBAR'->lowercaseFirst()
        );
    }

    public function testRemovePrefix() {
        $this->assertSame(
            'foobar',
            'setup-foobar'->removePrefix('setup-')
        );

        $this->assertSame(
            'foobar',
            'foobar'->removePrefix('setup-')
        );
    }

    public function testHasSuffix() {
        $this->assertTrue('explorer.exe'->hasSuffix('.exe'));
        $this->assertFalse('explorer.exe'->hasSuffix('.com'));
    }

    public function testHasPrefix() {
        $this->assertTrue('explorer.exe'->hasPrefix('ex'));
        $this->assertFalse('explorer.exe'->hasPrefix('xp'));
    }

    public function testLowercase() {
        $this->assertSame(
            'foobar',
            'FooBar'->lowercase()
        );
    }

    public function testReverse() {
        $this->assertSame(
            'raboof',
            'foobar'->reverse()
        );
    }

    public function testConcat() {
        $this->assertSame(
            'foobar',
            'foo'->concat('bar')
        );
    }

    public function testAddSuffix() {
        $this->assertSame(
            'foobar',
            'foo'->addSuffix('bar')
        );

        $this->assertSame(
            'foobar',
            'foobar'->addSuffix('bar')
        );
    }

    public function testWrap() {
        $this->assertSame(
            "foo\nbar",
            'foobar'->wrap(3, "\n", TRUE)
        );
    }

    public function testLength() {
        $this->assertSame(
            16,
            'test@example.com'->length()
        );
    }

    /*
    public function testCountChars() {
    }
    */

    public function testSlice() {
        $this->assertSame(
            't@exa',
            'test@example.com'->slice(3, 5)
        );
    }

    public function testTrim() {
        $this->assertSame(
            'foobar',
            ' foobar '->trim()
        );
    }

    public function testContains() {
        $this->assertTrue('test@example.com'->contains('@'));
        $this->assertFalse('test@example.com'->contains('#'));
    }
}
