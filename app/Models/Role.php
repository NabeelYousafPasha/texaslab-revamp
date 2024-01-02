<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder,
    Factories\HasFactory
};
use Spatie\Permission\Models\Role as SpatieRole;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Role extends SpatieRole implements Auditable
{
    use HasFactory, AuditableTrait;

    const SUPER_ADMIN = 'super_admin';

    const CLINIC_ADMIN = 'clinic_admin';

    const PATIENT = 'patient';

    /**
     *
     * @return array
     */
    public static function getAllRoleConstants(): array
    {
        return [
            self::SUPER_ADMIN,
            self::CLINIC_ADMIN,
            self::PATIENT,
        ];
    }

    /**
     * |--------------------------------------------------------------------------
     * | SCOPES
     * |--------------------------------------------------------------------------
     */

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeOfSuperAdmin(Builder $query): Builder
    {
        return $query->where('name', '=', self::SUPER_ADMIN);
    }
}
