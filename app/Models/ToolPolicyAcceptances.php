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
 * Model ToolPolicyAcceptances
 * Tracks users accepting the policy versions
 */
class ToolPolicyAcceptances extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_policy_acceptances';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'policyversionid' => 'integer',
        'userid' => 'integer',
        'status' => 'boolean',
        'lang' => 'string',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'note' => 'string',
    ];

    // Relationships: BelongsTo
    public function toolPolicyVersions()
    {
        return $this->belongsTo(ToolPolicyVersions::class, 'policyversionid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
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
            'policyversionid' => (int)$this->policyversionid,
            'userid' => (int)$this->userid,
            'status' => (int)$this->status,
            'lang' => (string)$this->lang,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'note' => (string)$this->note,
        ];
    }

    public function searchableAs()
    {
        return 'tool_policy_acceptances_index';
    }
}
