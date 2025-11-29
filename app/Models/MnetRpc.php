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
 * Model MnetRpc
 * Functions or methods that we may publish or subscribe to
 */
class MnetRpc extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'mnet_rpc';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'functionname' => 'string',
        'xmlrpcpath' => 'string',
        'plugintype' => 'string',
        'pluginname' => 'string',
        'enabled' => 'boolean',
        'help' => 'string',
        'profile' => 'string',
        'filename' => 'string',
        'classname' => 'string',
        'static' => 'boolean',
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
            'help' => (string)$this->help,
            'profile' => (string)$this->profile,
            'filename' => (string)$this->filename,
            'classname' => (string)$this->classname,
            'static' => (int)$this->static,
        ];
    }

    public function searchableAs()
    {
        return 'mnet_rpc_index';
    }
}
