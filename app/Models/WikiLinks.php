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
 * Model WikiLinks
 * Page wiki links
 */
class WikiLinks extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'wiki_links';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'subwikiid' => 'integer',
        'frompageid' => 'integer',
        'topageid' => 'integer',
        'tomissingpage' => 'string',
    ];

    // Relationships: BelongsTo
    public function wikiPages()
    {
        return $this->belongsTo(WikiPages::class, 'frompageid');
    }

    public function wikiSubwikis()
    {
        return $this->belongsTo(WikiSubwikis::class, 'subwikiid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'subwikiid' => (int)$this->subwikiid,
            'frompageid' => (int)$this->frompageid,
            'topageid' => (int)$this->topageid,
            'tomissingpage' => (string)$this->tomissingpage,
        ];
    }

    public function searchableAs()
    {
        return 'wiki_links_index';
    }
}
