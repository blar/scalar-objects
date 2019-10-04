<?php

namespace Blar\ScalarObjects;

abstract class StringHandler {

    public static function split(string $value, string $separator, int $limit = PHP_INT_MAX): array {
        return explode($separator, $value, $limit);
    }

    public static function format(string $value, ...$values): string {
        return sprintf($value, ...$values);
    }

    public static function lowercase(string $value): string {
        return strtolower($value);
    }

    public static function lowercaseFirst(string $value): string {
        return lcfirst($value);
    }

    public static function uppercase(string $value): string {
        return strtoupper($value);
    }

    public static function uppercaseFirst(string $value): string {
        return ucfirst($value);
    }

    public static function uppercaseWords(string $value): string {
        return ucwords($value);
    }

    public static function trim(string $value): string {
        return trim($value);
    }

    public static function contains(string $value, string $needle): bool {
        return $value->position($needle) !== FALSE;
    }

    public static function position(string $value, string $needle, int $offset = 0) {
        return strpos($value, $needle, $offset);
    }

    public static function slice(string $value, int $offset, int $length = PHP_INT_MAX): string {
        return substr($value, $offset, $length);
    }

    public static function reverse(string $value): string {
        return strrev($value);
    }

    public static function before(string $value, string $needle): string {
        return strstr($value, $needle, TRUE);
    }

    public static function after(string $value, string $needle): string {
        return strstr($value, $needle, FALSE);
    }

    public static function length(string $value): int {
        return strlen($value);
    }

    public static function repeat(string $value, int $multiplier): string {
        return str_repeat($value, $multiplier);
    }

    public static function replace(string $value): string {
        // strtr(string $value, array $replacement);
        if(func_num_args() === 2 and is_array(func_get_arg(1))) {
            return strtr(
                $value,
                func_get_arg(1)
            );
        }

        // str_replace(string $value, string $needle, string $replacement);
        if(func_num_args() === 3 and is_string(func_get_arg(1)) and is_string(func_get_arg(2))) {
            return str_replace(
                func_get_arg(1),
                func_get_arg(2),
                $value
            );
        }

        // str_replace(string $value, string $needle, string $replacement);
        if(func_num_args() === 3 and is_string(func_get_arg(1)) and is_callable(func_get_arg(2))) {
            return preg_replace_callback(
                func_get_arg(1),
                func_get_arg(2),
                $value
            );
        }
    }

    public static function hasPrefix(string $value, string $prefix): bool {
        return $value->slice(0, $prefix->length()) === $prefix;
    }

    public static function addPrefix(string $value, string $prefix): string {
        if($value->hasPrefix($prefix)) {
            return $value;
        }
        return $prefix->concat($value);
    }

    public static function removePrefix(string $value, string $prefix): string {
        if(!$value->hasPrefix($prefix)) {
            return $value;
        }
        return $value->slice($prefix->length());
    }

    public static function hasSuffix(string $value, string $suffix): bool {
        return $value->slice(-$suffix->length()) === $suffix;
    }

    public static function addSuffix(string $value, string $suffix): string {
        if($value->hasSuffix($suffix)) {
            return $value;
        }
        return $value->concat($suffix);
    }

    public static function removeSuffix(string $value, string $suffix): string {
        if(!$value->hasSuffix($suffix)) {
            return $value;
        }
        return $value->slice(0, -$suffix->length());
    }

    public static function concat(string $value, ...$values): string {
        return $value . $values->join();
    }

    public static function wrap(string $value, int $length = 75, string $break = "\n", bool $cut = FALSE): string {
        return wordwrap($value, $length, $break, $cut);
    }

    public static function countChars(string $value): int {
        return count_chars($value, 3);
    }

    public static function countWords(string $value): int {
        return str_word_count($value);
    }

}
