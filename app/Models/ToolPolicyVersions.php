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
 * Model ToolPolicyVersions
 * Holds versions of the policy documents
 */
class ToolPolicyVersions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_policy_versions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type' => 'integer',
        'audience' => 'integer',
        'archived' => 'integer',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'policyid' => 'integer',
        'agreementstyle' => 'integer',
        'optional' => 'integer',
        'revision' => 'string',
        'summary' => 'string',
        'summaryformat' => 'integer',
        'content' => 'string',
        'contentformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    public function toolPolicy()
    {
        return $this->belongsTo(ToolPolicy::class, 'policyid');
    }

    // Relationships: HasMany
    public function toolPolicys()
    {
        return $this->hasMany(ToolPolicy::class, 'currentversionid');
    }

    public function toolPolicyAcceptancess()
    {
        return $this->hasMany(ToolPolicyAcceptances::class, 'policyversionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'type' => (int)$this->type,
            'audience' => (int)$this->audience,
            'archived' => (int)$this->archived,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'policyid' => (int)$this->policyid,
            'agreementstyle' => (int)$this->agreementstyle,
            'optional' => (int)$this->optional,
            'revision' => (string)$this->revision,
            'summary' => (string)$this->summary,
            'summaryformat' => (int)$this->summaryformat,
            'content' => (string)$this->content,
            'contentformat' => (int)$this->contentformat,
        ];
    }

    public function searchableAs()
    {
        return 'tool_policy_versions_index';
    }
}
