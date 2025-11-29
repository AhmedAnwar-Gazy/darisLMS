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
 * Model MessageAirnotifierDevices
 * Store information about the devices registered in Airnotifier for PUSH notifications
 */
class MessageAirnotifierDevices extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'message_airnotifier_devices';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userdeviceid' => 'integer',
        'enable' => 'boolean',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userdeviceid' => (int)$this->userdeviceid,
            'enable' => (int)$this->enable,
        ];
    }

    public function searchableAs()
    {
        return 'message_airnotifier_devices_index';
    }
}
