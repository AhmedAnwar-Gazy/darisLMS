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
 * Model BlockRssClient
 * Remote news feed information. Contains the news feed id, the userid of the user who added the feed, the title of the feed itself and a description of the feed contents along with the url used to access the remote feed. Preferredtitle is a field for future use - intended to allow for custom titles rather than those found in the feed
 */
class BlockRssClient extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'block_rss_client';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'title' => 'string',
        'preferredtitle' => 'string',
        'description' => 'string',
        'shared' => 'integer',
        'url' => 'string',
        'skiptime' => 'integer',
        'skipuntil' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'title' => (string)$this->title,
            'preferredtitle' => (string)$this->preferredtitle,
            'description' => (string)$this->description,
            'shared' => (int)$this->shared,
            'url' => (string)$this->url,
            'skiptime' => (int)$this->skiptime,
            'skipuntil' => (int)$this->skipuntil,
        ];
    }

    public function searchableAs()
    {
        return 'block_rss_client_index';
    }
}
