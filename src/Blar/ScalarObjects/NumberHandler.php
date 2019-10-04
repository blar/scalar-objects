<?php

namespace Blar\ScalarObjects;

abstract class NumberHandler {

    public static function abs($value) {
        return abs($value);
    }

    public static function between($value, $min, $max): bool {
        if($value < $min) {
            return FALSE;
        }
        if($value > $max) {
            return FALSE;
        }
        return TRUE;
    }

    public static function isPositive($value): bool {
        return $value > 0;
    }

    public static function isNegative($value): bool {
        return $value < 0;
    }

}
