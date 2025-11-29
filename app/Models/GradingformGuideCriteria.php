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
 * Model GradingformGuideCriteria
 * Stores the rows of the criteria grid.
 */
class GradingformGuideCriteria extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'gradingform_guide_criteria';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'definitionid' => 'integer',
        'sortorder' => 'integer',
        'shortname' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'descriptionmarkers' => 'string',
        'descriptionmarkersformat' => 'integer',
        'maxscore' => 'float',
    ];

    // Relationships: BelongsTo
    public function gradingDefinitions()
    {
        return $this->belongsTo(GradingDefinitions::class, 'definitionid');
    }

    // Relationships: HasMany
    public function gradingformGuideFillingss()
    {
        return $this->hasMany(GradingformGuideFillings::class, 'criterionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'definitionid' => (int)$this->definitionid,
            'sortorder' => (int)$this->sortorder,
            'shortname' => (string)$this->shortname,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'descriptionmarkers' => (string)$this->descriptionmarkers,
            'descriptionmarkersformat' => (int)$this->descriptionmarkersformat,
            'maxscore' => (float)$this->maxscore,
        ];
    }

    public function searchableAs()
    {
        return 'gradingform_guide_criteria_index';
    }
}
