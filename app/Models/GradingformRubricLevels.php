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
 * Model GradingformRubricLevels
 * Stores the columns of the rubric grid.
 */
class GradingformRubricLevels extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'gradingform_rubric_levels';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'criterionid' => 'integer',
        'score' => 'float',
        'definition' => 'string',
        'definitionformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function gradingformRubricCriteria()
    {
        return $this->belongsTo(GradingformRubricCriteria::class, 'criterionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'criterionid' => (int)$this->criterionid,
            'score' => (float)$this->score,
            'definition' => (string)$this->definition,
            'definitionformat' => (int)$this->definitionformat,
        ];
    }

    public function searchableAs()
    {
        return 'gradingform_rubric_levels_index';
    }
}
