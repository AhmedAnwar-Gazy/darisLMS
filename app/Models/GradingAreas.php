<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

/**
 * Model GradingAreas
 * Identifies gradable areas where advanced grading can happen. For each area, the current active plugin can be set.
 */
class GradingAreas extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grading_areas';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextid' => 'integer',
        'component' => 'string',
        'areaname' => 'string',
        'activemethod' => 'string',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function gradingDefinitionss()
    {
        return $this->hasMany(GradingDefinitions::class, 'areaid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextid' => (int)$this->contextid,
            'component' => (string)$this->component,
            'areaname' => (string)$this->areaname,
            'activemethod' => (string)$this->activemethod,
        ];
    }

    public function searchableAs()
    {
        return 'grading_areas_index';
    }
}
