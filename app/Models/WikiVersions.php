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
 * Model WikiVersions
 * Stores wiki page history
 */
class WikiVersions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'wiki_versions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'pageid' => 'integer',
        'content' => 'string',
        'contentformat' => 'string',
        'version' => 'integer',
        'timecreated' => 'integer',
        'userid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function wikiPages()
    {
        return $this->belongsTo(WikiPages::class, 'pageid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'pageid' => (int)$this->pageid,
            'content' => (string)$this->content,
            'contentformat' => (string)$this->contentformat,
            'version' => (int)$this->version,
            'timecreated' => (int)$this->timecreated,
            'userid' => (int)$this->userid,
        ];
    }

    public function searchableAs()
    {
        return 'wiki_versions_index';
    }
}
