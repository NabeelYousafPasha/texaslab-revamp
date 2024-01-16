<?php

namespace App\Enums;

enum GenderEnum: string
{
    case Male = 'M';

    case Female = 'F';

    case Others = 'O';

    /**
     * @return array<string,string>
     */
    public static function asSelectArray(): array
    {
        /** @var array<string,string> $values */

        $values = collect(self::cases())
            ->map(function ($enum) {
                return [
                    'name' => $enum->name,
                    'value' => $enum->value,
                ];
            })
            ->toArray();
    
        return $values;
    }
}