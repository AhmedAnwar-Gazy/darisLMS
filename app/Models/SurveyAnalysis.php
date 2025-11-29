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
 * Model SurveyAnalysis
 * text about each survey submission
 */
class SurveyAnalysis extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'survey_analysis';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'survey' => 'integer',
        'userid' => 'integer',
        'notes' => 'string',
    ];

    // Relationships: BelongsTo
    public function surveyRelation()
    {
        return $this->belongsTo(Survey::class, 'survey');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'survey' => (int)$this->survey,
            'userid' => (int)$this->userid,
            'notes' => (string)$this->notes,
        ];
    }

    public function searchableAs()
    {
        return 'survey_analysis_index';
    }
}
