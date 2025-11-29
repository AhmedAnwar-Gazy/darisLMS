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
 * Model GlossaryAlias
 * entries alias
 */
class GlossaryAlias extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'glossary_alias';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'entryid' => 'integer',
        'alias' => 'string',
    ];

    // Relationships: BelongsTo
    public function glossaryEntries()
    {
        return $this->belongsTo(GlossaryEntries::class, 'entryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'entryid' => (int)$this->entryid,
            'alias' => (string)$this->alias,
        ];
    }

    public function searchableAs()
    {
        return 'glossary_alias_index';
    }
}
