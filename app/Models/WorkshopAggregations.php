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
 * Model WorkshopAggregations
 * Aggregated grades for assessment are stored here. The aggregated grade for submission is stored in workshop_submissions
 */
class WorkshopAggregations extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'workshop_aggregations';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'workshopid' => 'integer',
        'userid' => 'integer',
        'gradinggrade' => 'float',
        'timegraded' => 'integer',
    ];

    // Relationships: BelongsTo
    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshopid');
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
            'workshopid' => (int)$this->workshopid,
            'userid' => (int)$this->userid,
            'gradinggrade' => (float)$this->gradinggrade,
            'timegraded' => (int)$this->timegraded,
        ];
    }

    public function searchableAs()
    {
        return 'workshop_aggregations_index';
    }
}
