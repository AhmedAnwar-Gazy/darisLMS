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
 * Model GradingInstances
 * Grading form instance is an assessment record for one gradable item assessed by one rater
 */
class GradingInstances extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grading_instances';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'definitionid' => 'integer',
        'raterid' => 'integer',
        'itemid' => 'integer',
        'rawgrade' => 'float',
        'status' => 'integer',
        'feedback' => 'string',
        'feedbackformat' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function gradingDefinitions()
    {
        return $this->belongsTo(GradingDefinitions::class, 'definitionid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'raterid');
    }

    // Relationships: HasMany
    public function gradingformGuideFillingss()
    {
        return $this->hasMany(GradingformGuideFillings::class, 'instanceid');
    }

    public function gradingformRubricFillingss()
    {
        return $this->hasMany(GradingformRubricFillings::class, 'instanceid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'definitionid' => (int)$this->definitionid,
            'raterid' => (int)$this->raterid,
            'itemid' => (int)$this->itemid,
            'rawgrade' => (float)$this->rawgrade,
            'status' => (int)$this->status,
            'feedback' => (string)$this->feedback,
            'feedbackformat' => (int)$this->feedbackformat,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'grading_instances_index';
    }
}
