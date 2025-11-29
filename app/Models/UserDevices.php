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
 * Model UserDevices
 * This table stores user's mobile devices information in order to send PUSH notifications
 */
class UserDevices extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'user_devices';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'appid' => 'string',
        'name' => 'string',
        'model' => 'string',
        'platform' => 'string',
        'version' => 'string',
        'pushid' => 'string',
        'uuid' => 'string',
        'publickey' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'appid' => (string)$this->appid,
            'name' => (string)$this->name,
            'model' => (string)$this->model,
            'platform' => (string)$this->platform,
            'version' => (string)$this->version,
            'pushid' => (string)$this->pushid,
            'uuid' => (string)$this->uuid,
            'publickey' => (string)$this->publickey,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'user_devices_index';
    }
}
