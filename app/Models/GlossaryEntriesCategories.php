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
 * Model GlossaryEntriesCategories
 * categories of each glossary entry
 */
class GlossaryEntriesCategories extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'glossary_entries_categories';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'categoryid' => 'integer',
        'entryid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function glossaryCategories()
    {
        return $this->belongsTo(GlossaryCategories::class, 'categoryid');
    }

    public function glossaryEntries()
    {
        return $this->belongsTo(GlossaryEntries::class, 'entryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'categoryid' => (int)$this->categoryid,
            'entryid' => (int)$this->entryid,
        ];
    }

    public function searchableAs()
    {
        return 'glossary_entries_categories_index';
    }
}
