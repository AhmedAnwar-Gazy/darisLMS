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
 * Model AnalyticsModels
 * Analytic models.
 */
class AnalyticsModels extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'analytics_models';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'enabled' => 'boolean',
        'trained' => 'boolean',
        'name' => 'string',
        'target' => 'string',
        'indicators' => 'string',
        'timesplitting' => 'string',
        'predictionsprocessor' => 'string',
        'version' => 'integer',
        'contextids' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Relationships: HasMany
    public function analyticsModelsLogs()
    {
        return $this->hasMany(AnalyticsModelsLog::class, 'modelid');
    }

    public function analyticsPredictSampless()
    {
        return $this->hasMany(AnalyticsPredictSamples::class, 'modelid');
    }

    public function analyticsTrainSampless()
    {
        return $this->hasMany(AnalyticsTrainSamples::class, 'modelid');
    }

    public function analyticsPredictionss()
    {
        return $this->hasMany(AnalyticsPredictions::class, 'modelid');
    }

    public function analyticsUsedAnalysabless()
    {
        return $this->hasMany(AnalyticsUsedAnalysables::class, 'modelid');
    }

    public function analyticsUsedFiless()
    {
        return $this->hasMany(AnalyticsUsedFiles::class, 'modelid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'enabled' => (int)$this->enabled,
            'trained' => (int)$this->trained,
            'name' => (string)$this->name,
            'target' => (string)$this->target,
            'indicators' => (string)$this->indicators,
            'timesplitting' => (string)$this->timesplitting,
            'predictionsprocessor' => (string)$this->predictionsprocessor,
            'version' => (int)$this->version,
            'contextids' => (string)$this->contextids,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
        ];
    }

    public function searchableAs()
    {
        return 'analytics_models_index';
    }
}
