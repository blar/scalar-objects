<?php

namespace Blar\ScalarObjects;

use PHPUnit\Framework\TestCase;

class FloatHandlerTest extends TestCase {

    /*
    public function testRound() {
    }
    */

    /*
    public function testCeil() {
    }
    */

    public function testFormat() {
        $this->assertSame(
            '1,337.23',
            (1337.2342)->format(2, '.', ',')
        );
    }

    /*
    public function testFloor() {
    }
    */
}
