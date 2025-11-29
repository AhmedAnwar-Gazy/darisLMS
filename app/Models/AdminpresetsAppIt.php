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
 * Model AdminpresetsAppIt
 * Admin presets applied items. To maintain the relation with config_log
 */
class AdminpresetsAppIt extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'adminpresets_app_it';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'adminpresetapplyid' => 'integer',
        'configlogid' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'adminpresetapplyid' => (int)$this->adminpresetapplyid,
            'configlogid' => (int)$this->configlogid,
        ];
    }

    public function searchableAs()
    {
        return 'adminpresets_app_it_index';
    }
}
