<?php

namespace App\Constants;

/**
 * 定数
 */
abstract class Constant {
    const DATA = self::DATA;

    public static function all() {
        return static::DATA;
    }

    public static function keys() {
        return array_keys(static::DATA);
    }

    public static function values() {
        return array_values(static::DATA);
    }

    public static function key($value) {
        if (empty($value)) return;
        return array_search($value, static::DATA);
    }

    public static function value($key) {
        if ($key === '') return;
        return static::DATA[$key];
    }
}
