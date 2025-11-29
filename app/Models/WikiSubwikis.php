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
 * Model WikiSubwikis
 * Stores subwiki instances
 */
class WikiSubwikis extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'wiki_subwikis';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'wikiid' => 'integer',
        'groupid' => 'integer',
        'userid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function wiki()
    {
        return $this->belongsTo(Wiki::class, 'wikiid');
    }

    // Relationships: HasMany
    public function wikiPagess()
    {
        return $this->hasMany(WikiPages::class, 'subwikiid');
    }

    public function wikiLinkss()
    {
        return $this->hasMany(WikiLinks::class, 'subwikiid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'wikiid' => (int)$this->wikiid,
            'groupid' => (int)$this->groupid,
            'userid' => (int)$this->userid,
        ];
    }

    public function searchableAs()
    {
        return 'wiki_subwikis_index';
    }
}
