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
 * Model AnalyticsPredictSamples
 * Samples already used for predictions.
 */
class AnalyticsPredictSamples extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'analytics_predict_samples';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'modelid' => 'integer',
        'analysableid' => 'integer',
        'timesplitting' => 'string',
        'rangeindex' => 'integer',
        'sampleids' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function analyticsModels()
    {
        return $this->belongsTo(AnalyticsModels::class, 'modelid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'modelid' => (int)$this->modelid,
            'analysableid' => (int)$this->analysableid,
            'timesplitting' => (string)$this->timesplitting,
            'rangeindex' => (int)$this->rangeindex,
            'sampleids' => (string)$this->sampleids,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'analytics_predict_samples_index';
    }
}
