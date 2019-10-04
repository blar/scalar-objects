<?php

namespace Blar\ScalarObjects;

use PHPUnit\Framework\TestCase;

class IntegerHandlerTest extends TestCase {

    public function testIsEven() {
        $this->assertTrue((2)->isEven());
        $this->assertFalse((2)->isOdd());
    }

    public function testTimes() {
        $this->expectOutputString("foofoofoo");
        (3)->times(function($i) {
            echo 'foo';
        });
    }

    public function testIsOdd() {
        $value = 3;
        $this->assertFalse((3)->isEven());
        $this->assertTrue((3)->isOdd());
    }
}
