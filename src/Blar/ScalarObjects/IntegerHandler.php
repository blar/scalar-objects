<?php

namespace Blar\ScalarObjects;

abstract class IntegerHandler extends NumberHandler {

    public static function isEven($value): bool {
        return $value % 2 === 0;
    }

    public static function isOdd($value): bool {
        return $value % 2 === 1;
    }

    public static function times(int $value, callable $callback) {
        for($i = 0; $i < $value; $i++) {
            $callback($i);
        }
    }

}
