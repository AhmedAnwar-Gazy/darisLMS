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
 * Model AssignUserFlags
 * List of flags that can be set for a single user in a single assignment.
 */
class AssignUserFlags extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assign_user_flags';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'assignment' => 'integer',
        'locked' => 'integer',
        'mailed' => 'integer',
        'extensionduedate' => 'integer',
        'workflowstate' => 'string',
        'allocatedmarker' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function assign()
    {
        return $this->belongsTo(Assign::class, 'assignment');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'assignment' => (int)$this->assignment,
            'locked' => (int)$this->locked,
            'mailed' => (int)$this->mailed,
            'extensionduedate' => (int)$this->extensionduedate,
            'workflowstate' => (string)$this->workflowstate,
            'allocatedmarker' => (int)$this->allocatedmarker,
        ];
    }

    public function searchableAs()
    {
        return 'assign_user_flags_index';
    }
}
