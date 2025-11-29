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
 * Model MnetHost2service
 * Information about the services for a given host
 */
class MnetHost2service extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'mnet_host2service';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'hostid' => 'integer',
        'serviceid' => 'integer',
        'publish' => 'boolean',
        'subscribe' => 'boolean',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'hostid' => (int)$this->hostid,
            'serviceid' => (int)$this->serviceid,
            'publish' => (int)$this->publish,
            'subscribe' => (int)$this->subscribe,
        ];
    }

    public function searchableAs()
    {
        return 'mnet_host2service_index';
    }
}
