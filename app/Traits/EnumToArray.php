<?php

namespace App\Traits;

/**
 * EnumToArray trait
 * 
 * @method array names()
 * @method array values()
 * @method array array()
 * @method boolean containsValue()
 */
trait EnumToArray
{

    /**
     * Return Enum names
     * 
     * @return array
     */
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    /**
     * Return Enum values
     *
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Retun Enum value:name as array
     *
     * @return array
     */
    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }

    /**
     * Return boolean by checking passed value
     *
     * @param [type] $value
     * 
     * @return boolean
     */
    public static function containsValue($value): bool
    {
        return in_array($value, self::values(), true);
    }

}