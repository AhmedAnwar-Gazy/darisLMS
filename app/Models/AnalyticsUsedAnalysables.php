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
 * Model AnalyticsUsedAnalysables
 * List of analysables used by each model
 */
class AnalyticsUsedAnalysables extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'analytics_used_analysables';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'modelid' => 'integer',
        'action' => 'string',
        'analysableid' => 'integer',
        'firstanalysis' => 'integer',
        'timeanalysed' => 'integer',
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
            'action' => (string)$this->action,
            'analysableid' => (int)$this->analysableid,
            'firstanalysis' => (int)$this->firstanalysis,
            'timeanalysed' => (int)$this->timeanalysed,
        ];
    }

    public function searchableAs()
    {
        return 'analytics_used_analysables_index';
    }
}
