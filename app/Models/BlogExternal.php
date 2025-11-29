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
 * Model BlogExternal
 * External blog links used for RSS copying of blog entries to Moodle user blogs
 */
class BlogExternal extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'blog_external';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'url' => 'string',
        'filtertags' => 'string',
        'failedlastsync' => 'boolean',
        'timemodified' => 'integer',
        'timefetched' => 'integer',
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
            'name' => (string)$this->name,
            'description' => (string)$this->description,
            'url' => (string)$this->url,
            'filtertags' => (string)$this->filtertags,
            'failedlastsync' => (int)$this->failedlastsync,
            'timemodified' => (int)$this->timemodified,
            'timefetched' => (int)$this->timefetched,
        ];
    }

    public function searchableAs()
    {
        return 'blog_external_index';
    }
}
