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
 * Model AdminpresetsApp
 * Applied presets
 */
class AdminpresetsApp extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'adminpresets_app';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'adminpresetid' => 'integer',
        'userid' => 'integer',
        'time' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'adminpresetid' => (int)$this->adminpresetid,
            'userid' => (int)$this->userid,
            'time' => (int)$this->time,
        ];
    }

    public function searchableAs()
    {
        return 'adminpresets_app_index';
    }
}
