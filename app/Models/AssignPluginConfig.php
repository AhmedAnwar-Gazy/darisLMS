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
 * Model AssignPluginConfig
 * Config data for an instance of a plugin in an assignment.
 */
class AssignPluginConfig extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'assign_plugin_config';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'assignment' => 'integer',
        'plugin' => 'string',
        'subtype' => 'string',
        'name' => 'string',
        'value' => 'string',
    ];

    // Relationships: BelongsTo
    public function assign()
    {
        return $this->belongsTo(Assign::class, 'assignment');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'assignment' => (int)$this->assignment,
            'plugin' => (string)$this->plugin,
            'subtype' => (string)$this->subtype,
            'name' => (string)$this->name,
            'value' => (string)$this->value,
        ];
    }

    public function searchableAs()
    {
        return 'assign_plugin_config_index';
    }
}
