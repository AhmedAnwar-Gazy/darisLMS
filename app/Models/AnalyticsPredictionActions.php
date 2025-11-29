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
 * Model AnalyticsPredictionActions
 * Register of user actions over predictions.
 */
class AnalyticsPredictionActions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'analytics_prediction_actions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'predictionid' => 'integer',
        'userid' => 'integer',
        'actionname' => 'string',
        'timecreated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function analyticsPredictions()
    {
        return $this->belongsTo(AnalyticsPredictions::class, 'predictionid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'predictionid' => (int)$this->predictionid,
            'userid' => (int)$this->userid,
            'actionname' => (string)$this->actionname,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'analytics_prediction_actions_index';
    }
}
