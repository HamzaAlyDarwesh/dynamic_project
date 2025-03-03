<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_id',
        'value',
        'entity_id',
        'entity_type',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the attribute that owns the attribute value.
     * @return BelongsTo
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     * @return MorphTo
     */
    public function entity(): MorphTo
    {
        return $this->morphTo();
    }
}
