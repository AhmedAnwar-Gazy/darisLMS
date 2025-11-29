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
 * Model AnalyticsIndicatorCalc
 * Stored indicator calculations
 */
class AnalyticsIndicatorCalc extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'analytics_indicator_calc';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'starttime' => 'integer',
        'endtime' => 'integer',
        'contextid' => 'integer',
        'sampleorigin' => 'string',
        'sampleid' => 'integer',
        'indicator' => 'string',
        'value' => 'float',
        'timecreated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'starttime' => (int)$this->starttime,
            'endtime' => (int)$this->endtime,
            'contextid' => (int)$this->contextid,
            'sampleorigin' => (string)$this->sampleorigin,
            'sampleid' => (int)$this->sampleid,
            'indicator' => (string)$this->indicator,
            'value' => (float)$this->value,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'analytics_indicator_calc_index';
    }
}
