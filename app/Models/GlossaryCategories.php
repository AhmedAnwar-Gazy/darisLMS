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
 * Model GlossaryCategories
 * all categories for glossary entries
 */
class GlossaryCategories extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'glossary_categories';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'glossaryid' => 'integer',
        'name' => 'string',
        'usedynalink' => 'integer',
    ];

    // Relationships: BelongsTo
    public function glossary()
    {
        return $this->belongsTo(Glossary::class, 'glossaryid');
    }

    // Relationships: HasMany
    public function glossaryEntriesCategoriess()
    {
        return $this->hasMany(GlossaryEntriesCategories::class, 'categoryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'glossaryid' => (int)$this->glossaryid,
            'name' => (string)$this->name,
            'usedynalink' => (int)$this->usedynalink,
        ];
    }

    public function searchableAs()
    {
        return 'glossary_categories_index';
    }
}
