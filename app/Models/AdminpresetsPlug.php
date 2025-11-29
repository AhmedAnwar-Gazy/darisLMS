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
 * Model AdminpresetsPlug
 * Admin presets plugins status, to store information about whether they are enabled or not
 */
class AdminpresetsPlug extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'adminpresets_plug';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'adminpresetid' => 'integer',
        'plugin' => 'string',
        'name' => 'string',
        'enabled' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'adminpresetid' => (int)$this->adminpresetid,
            'plugin' => (string)$this->plugin,
            'name' => (string)$this->name,
            'enabled' => (int)$this->enabled,
        ];
    }

    public function searchableAs()
    {
        return 'adminpresets_plug_index';
    }
}
