<?php

namespace Blar\ScalarObjects;

use PHPUnit\Framework\TestCase;

class ArrayHandlerTest extends TestCase {

    public function testKeys() {
        $this->assertSame(
            ['a', 'b', 'c'],
            ['a' => 1, 'b' => 2, 'c' => 3]->keys()
        );
    }

    public function testFilter() {
        $filtered = [1, 2, 3, 4, 5, 6, 7, 8, 9]->filter(function($value, $key) {
            return $value->isEven();
        });
        $this->assertSame([2, 4, 6, 8], $filtered->values());

        $filtered = ['a', 'b', 'c', 'd', 'e']->filter(function($value, $key) {
            return $key->isEven();
        });

        $this->assertSame(['a', 'c', 'e'], $filtered->values());
    }

    public function testContains() {
        $this->assertTrue(['a', 'b', 'c', 'd', 'e']->contains('a'));
        $this->assertFalse(['a', 'b', 'c', 'd', 'e']->contains('z'));
    }

    public function testJoin() {
        $this->assertSame(
            'a,b,c,d,e',
            ['a', 'b', 'c', 'd', 'e']->join(',')
        );
    }

    public function testPad() {
        $this->assertSame(
            ['a', 'b', 'c', 'x', 'x'],
            ['a', 'b', 'c']->pad(5, 'x')
        );
    }

    public function testProduct() {
        $this->assertSame(
            42,
            [6, 7]->product()
        );
    }

    public function testUnique() {
        $this->assertSame(
            [0 => 'a', 1 => 'b', 3 => 'c'],
            ['a', 'b', 'b', 'c', 'a']->unique()
        );
    }

    public function testMap() {
        $this->assertSame(
            ['a0', 'b1', 'c2', 'd3', 'e4'],
            ['a', 'b', 'c', 'd', 'e']->map(function($value, $key) {
                return $value->concat($key);
            })
        );
    }

    public function testMax() {
        $this->assertSame(
            1337,
            [23, 42, 1337]->max()
        );
    }

    public function testIntersect() {
        $this->assertSame(
            ['b', 'c'],
            ['a', 'b', 'c']->intersect(['b', 'c', 'd'])->values()
        );
    }

    public function testChunk() {
        $this->assertSame(
            [['a', 'b'], ['c', 'd'], ['e']],
            ['a', 'b', 'c', 'd', 'e']->chunk(2)
        );
    }

    public function testSlice() {
        $this->assertSame(
            ['a', 'b'],
            ['a', 'b', 'c', 'd', 'e']->slice(0, 2)
        );

        $this->assertSame(
            ['d', 'e'],
            ['a', 'b', 'c', 'd', 'e']->slice(-2)
        );

        $this->assertSame(
            ['b', 'c', 'd'],
            ['a', 'b', 'c', 'd', 'e']->slice(1, 3)
        );

    }

    public function testSearch() {
        $this->assertSame(
            2,
            ['a', 'b', 'c', 'd', 'e']->search('c')
        );
    }

    public function testReverse() {
        $this->assertSame(
            ['e', 'd', 'c', 'b', 'a'],
            ['a', 'b', 'c', 'd', 'e']->reverse()
        );
    }

    public function testValues() {
        $this->assertSame(
            ['a', 'b', 'c', 'd', 'e'],
            [
                23 => 'a',
                28 => 'b',
                42 => 'c',
                97 => 'd',
                1337 => 'e'
            ]->values()
        );
    }

    public function testMerge() {
        $this->assertSame(
            ['a', 'b', 'c', 'd', 'e'],
            ['a', 'b', 'c']->merge(['d', 'e'])
        );
    }

    public function testSome() {
        $this->assertTrue(
            ['a', 'b', 'c', 'd', 'e']->some(function($value, $key) {
                return $value === 'c';
            })
        );

        $this->assertFalse(
            ['a', 'b', 'c', 'd', 'e']->some(function($value, $key) {
                return $value === 'z';
            })
        );
    }

    public function testLength() {
        $this->assertSame(
            3,
            ['foo', 'bar', 'foobar']->length()
        );
    }

    public function testPush() {
        $this->assertSame(
            ['foo', 'bar'],
            ['foo']->push('bar')
        );
    }

    public function testEvery() {
        $this->assertTrue(
            [2, 4, 6, 8]->every(function($value, $key) {
                return $value->isEven();
            })
        );

        $this->assertFalse(
            [2, 4, 6, 8, 9]->every(function($value, $key) {
                return $value->isEven();
            })
        );
    }

    public function testSum() {
        $this->assertSame(
            1402,
            [23, 42, 1337]->sum()
        );
    }

    /*
    public function testColumn() {
    }
    */

    public function testCombine() {
        $this->assertSame(
            [
                'foo' => 23,
                'bar' => 42,
                'foobar' => 1337
            ],
            [23, 42, 1337]->combine(['foo', 'bar', 'foobar'])
        );
    }

    public function testFlip() {
        $this->assertSame(
            [
                'x' => 'a',
                'y' => 'b',
                'z' => 'c'
            ],
            [
                'a' => 'x',
                'b' => 'y',
                'c' => 'z'
            ]->flip()
        );
    }

    public function testReduce() {
        $this->assertSame(1402, [23, 42, 1337]->reduce(function($carry, $value) {
            return $carry += $value;
        }, 0));
    }

    public function testSort() {
        $unsorted = ['foo', 'bar', 'foobar'];
        $this->assertSame(['foo', 'bar', 'foobar'], $unsorted);

        $sorted = $unsorted->sort(function($foo, $bar) {
            return $foo <=> $bar;
        });
        $this->assertSame(['bar', 'foo', 'foobar'], $sorted);

        $this->assertSame(['foo', 'bar', 'foobar'], $unsorted);
    }

    public function testMin() {
        $this->assertSame(
            23,
            [23, 42, 1337]->min()
        );
    }

    public function testSearchAll() {
        $this->assertSame(
            [0, 2],
            ['foo', 'bar', 'foo', 'foobar']->searchAll('foo')
        );
    }

    /*
    public function testReplace() {
    }
    */

}
