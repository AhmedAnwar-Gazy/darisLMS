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
 * Model ToolPolicy
 * Contains the list of policy documents defined on the site.
 */
class ToolPolicy extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_policy';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'sortorder' => 'integer',
        'currentversionid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function toolPolicyVersions()
    {
        return $this->belongsTo(ToolPolicyVersions::class, 'currentversionid');
    }

    // Relationships: HasMany
    public function toolPolicyVersionss()
    {
        return $this->hasMany(ToolPolicyVersions::class, 'policyid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'sortorder' => (int)$this->sortorder,
            'currentversionid' => (int)$this->currentversionid,
        ];
    }

    public function searchableAs()
    {
        return 'tool_policy_index';
    }
}
