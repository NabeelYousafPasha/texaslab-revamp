<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum InsuranceResponsibleRelationshipEnum: string
{
    use EnumToArray;

    case SELF = 'self';

    case SPOUSE = 'spouse';

    case CHILD = 'child';

    case OTHER = 'other';

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