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
 * Model RegistrationHubs
 * hub where the site is registered on with their associated token
 */
class RegistrationHubs extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'registration_hubs';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'token' => 'string',
        'hubname' => 'string',
        'huburl' => 'string',
        'confirmed' => 'boolean',
        'secret' => 'string',
        'timemodified' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'token' => (string)$this->token,
            'hubname' => (string)$this->hubname,
            'huburl' => (string)$this->huburl,
            'confirmed' => (int)$this->confirmed,
            'secret' => (string)$this->secret,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'registration_hubs_index';
    }
}
