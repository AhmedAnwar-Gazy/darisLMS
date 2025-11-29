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
 * Model MnetSsoAccessControl
 * Users by host permitted (or not) to login from a remote provider
 */
class MnetSsoAccessControl extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'mnet_sso_access_control';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'username' => 'string',
        'mnet_host_id' => 'integer',
        'accessctrl' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'username' => (string)$this->username,
            'mnet_host_id' => (int)$this->mnet_host_id,
            'accessctrl' => (string)$this->accessctrl,
        ];
    }

    public function searchableAs()
    {
        return 'mnet_sso_access_control_index';
    }
}
