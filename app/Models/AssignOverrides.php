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
 * Model AssignOverrides
 * The overrides to assign settings.
 */
class AssignOverrides extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assign_overrides';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'assignid' => 'integer',
        'groupid' => 'integer',
        'userid' => 'integer',
        'sortorder' => 'integer',
        'allowsubmissionsfromdate' => 'integer',
        'duedate' => 'integer',
        'cutoffdate' => 'integer',
        'timelimit' => 'integer',
    ];

    // Relationships: BelongsTo
    public function assign()
    {
        return $this->belongsTo(Assign::class, 'assignid');
    }

    public function groups()
    {
        return $this->belongsTo(Groups::class, 'groupid');
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
            'assignid' => (int)$this->assignid,
            'groupid' => (int)$this->groupid,
            'userid' => (int)$this->userid,
            'sortorder' => (int)$this->sortorder,
            'allowsubmissionsfromdate' => (int)$this->allowsubmissionsfromdate,
            'duedate' => (int)$this->duedate,
            'cutoffdate' => (int)$this->cutoffdate,
            'timelimit' => (int)$this->timelimit,
        ];
    }

    public function searchableAs()
    {
        return 'assign_overrides_index';
    }
}
