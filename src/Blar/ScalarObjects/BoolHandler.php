<?php

namespace Blar\ScalarObjects;

abstract class BoolHandler {

    public static function toggle(bool $value): bool {
        return !$value;
    }

    public static function then(bool $value, callable $callback) {
        return $callback($value);
    }

}
