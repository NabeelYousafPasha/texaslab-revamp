<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $model
 * @property string $code
 * @property string $name
 * @property ?\Illuminate\Support\Carbon $created_at
 * @property ?\Illuminate\Support\Carbon $updated_at
 */
class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'code',
        'name',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | SCOPES
     * |--------------------------------------------------------------------------
     */
    
    /**
     *
     * @param Builder $builder
     * @param string $model
     * @return Builder
     */
    public function scopeOfModel(Builder $builder, string $model): Builder
    {
        return $builder->where('model', '=', $model);
    }

    /**
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopeOfTest(Builder $builder): Builder
    {
        return $builder->ofModel(Test::class);
    }

    /**
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopeOfPanel(Builder $builder): Builder
    {
        return $builder->ofModel(Panel::class);
    }
}
