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
 * Model AnalyticsPredictions
 * Predictions
 */
class AnalyticsPredictions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'analytics_predictions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'modelid' => 'integer',
        'contextid' => 'integer',
        'sampleid' => 'integer',
        'rangeindex' => 'integer',
        'prediction' => 'float',
        'predictionscore' => 'float',
        'calculations' => 'string',
        'timecreated' => 'integer',
        'timestart' => 'integer',
        'timeend' => 'integer',
    ];

    // Relationships: BelongsTo
    public function analyticsModels()
    {
        return $this->belongsTo(AnalyticsModels::class, 'modelid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function analyticsPredictionActionss()
    {
        return $this->hasMany(AnalyticsPredictionActions::class, 'predictionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'modelid' => (int)$this->modelid,
            'contextid' => (int)$this->contextid,
            'sampleid' => (int)$this->sampleid,
            'rangeindex' => (int)$this->rangeindex,
            'prediction' => (float)$this->prediction,
            'predictionscore' => (float)$this->predictionscore,
            'calculations' => (string)$this->calculations,
            'timecreated' => (int)$this->timecreated,
            'timestart' => (int)$this->timestart,
            'timeend' => (int)$this->timeend,
        ];
    }

    public function searchableAs()
    {
        return 'analytics_predictions_index';
    }
}
