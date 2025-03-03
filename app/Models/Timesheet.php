<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'date',
        'hours',
        'user_id',
        'project_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the user that owns the timesheet.
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the project that owns the timesheet.
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
