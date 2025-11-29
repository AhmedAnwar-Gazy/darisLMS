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
 * Model AdminpresetsIt
 * Table to store settings
 */
class AdminpresetsIt extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'adminpresets_it';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'adminpresetid' => 'integer',
        'plugin' => 'string',
        'name' => 'string',
        'value' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'adminpresetid' => (int)$this->adminpresetid,
            'plugin' => (string)$this->plugin,
            'name' => (string)$this->name,
            'value' => (string)$this->value,
        ];
    }

    public function searchableAs()
    {
        return 'adminpresets_it_index';
    }
}
