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
 * Model ToolCustomlangComponents
 * Contains the list of all installed plugins that provide their own language pack
 */
class ToolCustomlangComponents extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_customlang_components';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'version' => 'string',
    ];

    // Relationships: HasMany
    public function toolCustomlangs()
    {
        return $this->hasMany(ToolCustomlang::class, 'componentid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'version' => (string)$this->version,
        ];
    }

    public function searchableAs()
    {
        return 'tool_customlang_components_index';
    }
}
