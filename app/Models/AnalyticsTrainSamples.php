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
 * Model AnalyticsTrainSamples
 * Samples used for training
 */
class AnalyticsTrainSamples extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'analytics_train_samples';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'modelid' => 'integer',
        'analysableid' => 'integer',
        'timesplitting' => 'string',
        'sampleids' => 'string',
        'timecreated' => 'integer',
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
            'sampleids' => (string)$this->sampleids,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'analytics_train_samples_index';
    }
}
