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
 * Model AdminpresetsItA
 * Admin presets items attributes. For settings with attributes (extra values like 'advanced')
 */
class AdminpresetsItA extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'adminpresets_it_a';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'itemid' => 'integer',
        'name' => 'string',
        'value' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'itemid' => (int)$this->itemid,
            'name' => (string)$this->name,
            'value' => (string)$this->value,
        ];
    }

    public function searchableAs()
    {
        return 'adminpresets_it_a_index';
    }
}
