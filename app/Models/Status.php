<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'code',
        'name',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | SCOPES
     * |--------------------------------------------------------------------------
     */
    
    /**
     *
     * @param Builder $builder
     * @param Model $model
     * @return Builder
     */
    public function scopeOfModel(Builder $builder, Model $model): Builder
    {
        return $builder->where('model', '=', $model::class);
    }
}
