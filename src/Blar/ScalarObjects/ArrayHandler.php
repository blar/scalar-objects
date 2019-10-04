<?php

namespace Blar\ScalarObjects;

abstract class ArrayHandler {

    public static function chunk(array $values, int $length): array {
        return array_chunk($values, $length);
    }

    public static function column(array $values, $column, $key = NULL): array {
        return array_column($values, $column, $key);
    }

    public static function combine(array $values, array $keys): array {
        return array_combine($keys, $values);
    }

    public static function filter(array $values, callable $callback): array {
        return array_filter($values, $callback, ARRAY_FILTER_USE_BOTH);
    }

    public static function flip(array $values): array {
        return array_flip($values);
    }

    public static function keys(array $values): array {
        return array_keys($values);
    }

    public static function map(array $values, callable $callback): array {
        return array_map($callback, $values, array_keys($values));
    }

    public static function merge(array $foo, array $bar): array {
        return array_merge($foo, $bar);
    }

    public static function pad(array $values, int $length, $pad = NULL): array {
        return array_pad($values, $length, $pad);
    }

    public static function reduce(array $values, callable $callback, $carry = NULL) {
        return array_reduce($values, $callback, $carry);
    }

    public static function reverse(array $values): array {
        return array_reverse($values);
    }

    public static function slice(array $values, int $offset, int $length = PHP_INT_MAX): array {
        return array_slice($values, $offset, $length);
    }

    public static function sort(array $values, callable $callback): array {
        usort($values, $callback);
        return $values;
    }

    public static function length(array $values): int {
        return count($values);
    }

    public static function push(array $values, $value): array {
        array_push($values, $value);
        return $values;
    }

    public static function each(array $values, callable $callback) {
        foreach($values as $key => $value) {
            $callback($value, $key);
        }
    }

    public static function replace(array $values, array $replacements): array {
        return array_replace($values, $replacements);
    }

    public static function join(array $values, string $separator = ''): string {
        return implode($separator, $values);
    }

    public static function min(array $values) {
        return min($values);
    }

    public static function max(array $values) {
        return max($values);
    }

    public static function sum(array $values) {
        return array_sum($values);
    }

    public static function product(array $values) {
        return array_product($values);
    }

    public static function some(array $values, callable $callback): bool {
        foreach($values as $key => $value) {
            if($callback($value, $key)) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public static function every(array $values, callable $callback): bool {
        foreach($values as $key => $value) {
            if(!$callback($value, $key)) {
                return FALSE;
            }
        }
        return TRUE;
    }

    public static function search(array $values, $needle) {
        return array_search($needle, $values, TRUE);
    }

    public static function searchAll(array $values, $needle) {
        return array_keys($values, $needle, TRUE);
    }

    public static function contains(array $values, $needle): bool {
        return $values->search($needle) !== FALSE;
    }

    public static function values(array $values): array {
        return array_values($values);
    }

    public static function unique(array $values, int $flags = SORT_STRING): array {
        return array_unique($values, $flags);
    }

    public static function intersect(array $values, array $foo): array {
        return array_intersect($values, $foo);
    }

}
