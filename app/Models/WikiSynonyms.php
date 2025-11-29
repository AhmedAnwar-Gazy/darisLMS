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
 * Model WikiSynonyms
 * Stores wiki pages synonyms
 */
class WikiSynonyms extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'wiki_synonyms';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'subwikiid' => 'integer',
        'pageid' => 'integer',
        'pagesynonym' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'subwikiid' => (int)$this->subwikiid,
            'pageid' => (int)$this->pageid,
            'pagesynonym' => (string)$this->pagesynonym,
        ];
    }

    public function searchableAs()
    {
        return 'wiki_synonyms_index';
    }
}
