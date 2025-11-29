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
 * Model AdminpresetsAppItA
 * Attributes of the applied items
 */
class AdminpresetsAppItA extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'adminpresets_app_it_a';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'adminpresetapplyid' => 'integer',
        'configlogid' => 'integer',
        'itemname' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'adminpresetapplyid' => (int)$this->adminpresetapplyid,
            'configlogid' => (int)$this->configlogid,
            'itemname' => (string)$this->itemname,
        ];
    }

    public function searchableAs()
    {
        return 'adminpresets_app_it_a_index';
    }
}
