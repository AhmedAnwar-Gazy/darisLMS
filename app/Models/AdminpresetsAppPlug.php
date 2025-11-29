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
 * Model AdminpresetsAppPlug
 * Admin presets plugins applied
 */
class AdminpresetsAppPlug extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'adminpresets_app_plug';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'adminpresetapplyid' => 'integer',
        'plugin' => 'string',
        'name' => 'string',
        'value' => 'integer',
        'oldvalue' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'adminpresetapplyid' => (int)$this->adminpresetapplyid,
            'plugin' => (string)$this->plugin,
            'name' => (string)$this->name,
            'value' => (int)$this->value,
            'oldvalue' => (int)$this->oldvalue,
        ];
    }

    public function searchableAs()
    {
        return 'adminpresets_app_plug_index';
    }
}
