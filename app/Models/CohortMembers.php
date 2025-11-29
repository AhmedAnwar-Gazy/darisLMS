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
 * Model CohortMembers
 * Link a user to a cohort.
 */
class CohortMembers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'cohort_members';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'cohortid' => 'integer',
        'userid' => 'integer',
        'timeadded' => 'integer',
    ];

    // Relationships: BelongsTo
    public function cohort()
    {
        return $this->belongsTo(Cohort::class, 'cohortid');
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
            'cohortid' => (int)$this->cohortid,
            'userid' => (int)$this->userid,
            'timeadded' => (int)$this->timeadded,
        ];
    }

    public function searchableAs()
    {
        return 'cohort_members_index';
    }
}
