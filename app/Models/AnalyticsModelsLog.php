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
 * Model AnalyticsModelsLog
 * Analytic models changes during evaluation.
 */
class AnalyticsModelsLog extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'analytics_models_log';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'modelid' => 'integer',
        'version' => 'integer',
        'evaluationmode' => 'string',
        'target' => 'string',
        'indicators' => 'string',
        'timesplitting' => 'string',
        'score' => 'float',
        'info' => 'string',
        'dir' => 'string',
        'timecreated' => 'integer',
        'usermodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function analyticsModels()
    {
        return $this->belongsTo(AnalyticsModels::class, 'modelid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'modelid' => (int)$this->modelid,
            'version' => (int)$this->version,
            'evaluationmode' => (string)$this->evaluationmode,
            'target' => (string)$this->target,
            'indicators' => (string)$this->indicators,
            'timesplitting' => (string)$this->timesplitting,
            'score' => (float)$this->score,
            'info' => (string)$this->info,
            'dir' => (string)$this->dir,
            'timecreated' => (int)$this->timecreated,
            'usermodified' => (int)$this->usermodified,
        ];
    }

    public function searchableAs()
    {
        return 'analytics_models_log_index';
    }
}
