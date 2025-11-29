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
 * Model Capabilities
 * this defines all capabilities
 */
class Capabilities extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'capabilities';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'captype' => 'string',
        'contextlevel' => 'integer',
        'component' => 'string',
        'riskbitmask' => 'integer',
    ];

    // Relationships: HasMany
    public function roleCapabilitiess()
    {
        return $this->hasMany(RoleCapabilities::class, 'capability');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'captype' => (string)$this->captype,
            'contextlevel' => (int)$this->contextlevel,
            'component' => (string)$this->component,
            'riskbitmask' => (int)$this->riskbitmask,
        ];
    }

    public function searchableAs()
    {
        return 'capabilities_index';
    }
}
