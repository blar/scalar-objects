<?php

namespace Blar\ScalarObjects;

abstract class FloatHandler extends NumberHandler {

    public static function format(float $value, int $decimals = 0, string $decimalSeparator = '.', string $thousandsSeparator = ','): string {
        return number_format(
            $value,
            $decimals,
            $decimalSeparator,
            $thousandsSeparator
        );
    }

    public static function round(float $value, int $precision = 0): float {
        return round($value, $precision, PHP_ROUND_HALF_UP);
    }

    public static function floor(float $value): float {
        return floor($value);
    }

    public static function ceil(float $value): float {
        return ceil($value);
    }

}
