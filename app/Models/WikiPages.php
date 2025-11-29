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
 * Model WikiPages
 * Stores wiki pages
 */
class WikiPages extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'wiki_pages';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'subwikiid' => 'integer',
        'title' => 'string',
        'cachedcontent' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'timerendered' => 'integer',
        'userid' => 'integer',
        'pageviews' => 'integer',
        'readonly' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function wikiSubwikis()
    {
        return $this->belongsTo(WikiSubwikis::class, 'subwikiid');
    }

    // Relationships: HasMany
    public function wikiLinkss()
    {
        return $this->hasMany(WikiLinks::class, 'frompageid');
    }

    public function wikiVersionss()
    {
        return $this->hasMany(WikiVersions::class, 'pageid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'subwikiid' => (int)$this->subwikiid,
            'title' => (string)$this->title,
            'cachedcontent' => (string)$this->cachedcontent,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'timerendered' => (int)$this->timerendered,
            'userid' => (int)$this->userid,
            'pageviews' => (int)$this->pageviews,
            'readonly' => (int)$this->readonly,
        ];
    }

    public function searchableAs()
    {
        return 'wiki_pages_index';
    }
}
