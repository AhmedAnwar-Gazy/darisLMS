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
 * Model MnetApplication
 * Information about applications on remote hosts
 */
class MnetApplication extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'mnet_application';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'display_name' => 'string',
        'xmlrpc_server_url' => 'string',
        'sso_land_url' => 'string',
        'sso_jump_url' => 'string',
    ];

    // Relationships: HasMany
    public function mnetHosts()
    {
        return $this->hasMany(MnetHost::class, 'applicationid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'display_name' => (string)$this->display_name,
            'xmlrpc_server_url' => (string)$this->xmlrpc_server_url,
            'sso_land_url' => (string)$this->sso_land_url,
            'sso_jump_url' => (string)$this->sso_jump_url,
        ];
    }

    public function searchableAs()
    {
        return 'mnet_application_index';
    }
}
