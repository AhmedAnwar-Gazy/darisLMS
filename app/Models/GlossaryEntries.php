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
 * Model GlossaryEntries
 * all glossary entries
 */
class GlossaryEntries extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'glossary_entries';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'glossaryid' => 'integer',
        'userid' => 'integer',
        'concept' => 'string',
        'definition' => 'string',
        'definitionformat' => 'integer',
        'definitiontrust' => 'integer',
        'attachment' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'teacherentry' => 'integer',
        'sourceglossaryid' => 'integer',
        'usedynalink' => 'integer',
        'casesensitive' => 'integer',
        'fullmatch' => 'integer',
        'approved' => 'integer',
    ];

    // Relationships: BelongsTo
    public function glossary()
    {
        return $this->belongsTo(Glossary::class, 'glossaryid');
    }

    // Relationships: HasMany
    public function glossaryAliass()
    {
        return $this->hasMany(GlossaryAlias::class, 'entryid');
    }

    public function glossaryEntriesCategoriess()
    {
        return $this->hasMany(GlossaryEntriesCategories::class, 'entryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'glossaryid' => (int)$this->glossaryid,
            'userid' => (int)$this->userid,
            'concept' => (string)$this->concept,
            'definition' => (string)$this->definition,
            'definitionformat' => (int)$this->definitionformat,
            'definitiontrust' => (int)$this->definitiontrust,
            'attachment' => (string)$this->attachment,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'teacherentry' => (int)$this->teacherentry,
            'sourceglossaryid' => (int)$this->sourceglossaryid,
            'usedynalink' => (int)$this->usedynalink,
            'casesensitive' => (int)$this->casesensitive,
            'fullmatch' => (int)$this->fullmatch,
            'approved' => (int)$this->approved,
        ];
    }

    public function searchableAs()
    {
        return 'glossary_entries_index';
    }
}
