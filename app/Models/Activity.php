<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get all tasks for this activity.
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
