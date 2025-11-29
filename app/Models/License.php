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
 * Model License
 * store licenses used by moodle
 */
class License extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'license';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'shortname' => 'string',
        'fullname' => 'string',
        'source' => 'string',
        'enabled' => 'boolean',
        'version' => 'integer',
        'custom' => 'boolean',
        'sortorder' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'shortname' => (string)$this->shortname,
            'fullname' => (string)$this->fullname,
            'source' => (string)$this->source,
            'enabled' => (int)$this->enabled,
            'version' => (int)$this->version,
            'custom' => (int)$this->custom,
            'sortorder' => (int)$this->sortorder,
        ];
    }

    public function searchableAs()
    {
        return 'license_index';
    }
}
