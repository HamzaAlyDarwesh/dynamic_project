<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the attribute values for the attribute.
     * @return HasMany
     */
    public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }
}
