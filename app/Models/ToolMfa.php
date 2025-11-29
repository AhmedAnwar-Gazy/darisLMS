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
 * Model ToolMfa
 * Table to store factor configurations for users
 */
class ToolMfa extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_mfa';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'factor' => 'string',
        'secret' => 'string',
        'label' => 'string',
        'timecreated' => 'integer',
        'createdfromip' => 'string',
        'timemodified' => 'integer',
        'lastverified' => 'integer',
        'revoked' => 'boolean',
        'lockcounter' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'factor' => (string)$this->factor,
            'secret' => (string)$this->secret,
            'label' => (string)$this->label,
            'timecreated' => (int)$this->timecreated,
            'createdfromip' => (string)$this->createdfromip,
            'timemodified' => (int)$this->timemodified,
            'lastverified' => (int)$this->lastverified,
            'revoked' => (int)$this->revoked,
            'lockcounter' => (int)$this->lockcounter,
        ];
    }

    public function searchableAs()
    {
        return 'tool_mfa_index';
    }
}
