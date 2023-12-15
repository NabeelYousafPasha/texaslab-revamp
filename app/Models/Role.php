<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder,
    Factories\HasFactory
};
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    const SUPER_ADMIN = 'super_admin';

    /**
     *
     * @return array
     */
    public static function getAllRoleConstants(): array
    {
        return [
            self::SUPER_ADMIN,
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
