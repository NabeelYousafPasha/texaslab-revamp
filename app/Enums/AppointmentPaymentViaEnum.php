<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum AppointmentPaymentViaEnum: string
{
    use EnumToArray;

    case CASH = 'cash';

    case INSURANCE = 'insurance';

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