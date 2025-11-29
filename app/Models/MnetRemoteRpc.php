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
 * Model MnetRemoteRpc
 * This table describes functions that might be called remotely (we have less information about them than local functions)
 */
class MnetRemoteRpc extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'mnet_remote_rpc';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'functionname' => 'string',
        'xmlrpcpath' => 'string',
        'plugintype' => 'string',
        'pluginname' => 'string',
        'enabled' => 'boolean',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'functionname' => (string)$this->functionname,
            'xmlrpcpath' => (string)$this->xmlrpcpath,
            'plugintype' => (string)$this->plugintype,
            'pluginname' => (string)$this->pluginname,
            'enabled' => (int)$this->enabled,
        ];
    }

    public function searchableAs()
    {
        return 'mnet_remote_rpc_index';
    }
}
