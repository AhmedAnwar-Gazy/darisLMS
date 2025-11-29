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
 * Model ToolBrickfieldChecks
 * Checks details
 */
class ToolBrickfieldChecks extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_brickfield_checks';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'checktype' => 'string',
        'shortname' => 'string',
        'checkgroup' => 'integer',
        'status' => 'integer',
        'severity' => 'integer',
    ];

    // Relationships: HasMany
    public function toolBrickfieldResultss()
    {
        return $this->hasMany(ToolBrickfieldResults::class, 'checkid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'checktype' => (string)$this->checktype,
            'shortname' => (string)$this->shortname,
            'checkgroup' => (int)$this->checkgroup,
            'status' => (int)$this->status,
            'severity' => (int)$this->severity,
        ];
    }

    public function searchableAs()
    {
        return 'tool_brickfield_checks_index';
    }
}
