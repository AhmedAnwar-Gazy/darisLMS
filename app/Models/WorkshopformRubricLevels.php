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
 * Model WorkshopformRubricLevels
 * The definition of rubric rating scales
 */
class WorkshopformRubricLevels extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'workshopform_rubric_levels';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'dimensionid' => 'integer',
        'grade' => 'float',
        'definition' => 'string',
        'definitionformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function workshopformRubric()
    {
        return $this->belongsTo(WorkshopformRubric::class, 'dimensionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'dimensionid' => (int)$this->dimensionid,
            'grade' => (float)$this->grade,
            'definition' => (string)$this->definition,
            'definitionformat' => (int)$this->definitionformat,
        ];
    }

    public function searchableAs()
    {
        return 'workshopform_rubric_levels_index';
    }
}
