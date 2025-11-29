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
 * Model ConfigLog
 * Changes done in server configuration through admin UI
 */
class ConfigLog extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'config_log';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'timemodified' => 'integer',
        'plugin' => 'string',
        'name' => 'string',
        'value' => 'string',
        'oldvalue' => 'string',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'timemodified' => (int)$this->timemodified,
            'plugin' => (string)$this->plugin,
            'name' => (string)$this->name,
            'value' => (string)$this->value,
            'oldvalue' => (string)$this->oldvalue,
        ];
    }

    public function searchableAs()
    {
        return 'config_log_index';
    }
}
