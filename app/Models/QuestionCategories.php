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
 * Model QuestionCategories
 * Categories are for grouping questions
 */
class QuestionCategories extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_categories';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'contextid' => 'integer',
        'info' => 'string',
        'infoformat' => 'integer',
        'stamp' => 'string',
        'parent' => 'integer',
        'sortorder' => 'integer',
        'idnumber' => 'string',
    ];

    // Relationships: BelongsTo
    public function questionCategories()
    {
        return $this->belongsTo(QuestionCategories::class, 'parent');
    }

    // Relationships: HasMany
    public function questionCategoriess()
    {
        return $this->hasMany(QuestionCategories::class, 'parent');
    }

    public function questionBankEntriess()
    {
        return $this->hasMany(QuestionBankEntries::class, 'questioncategoryid');
    }

    public function questionDatasetDefinitionss()
    {
        return $this->hasMany(QuestionDatasetDefinitions::class, 'category');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'contextid' => (int)$this->contextid,
            'info' => (string)$this->info,
            'infoformat' => (int)$this->infoformat,
            'stamp' => (string)$this->stamp,
            'parent' => (int)$this->parent,
            'sortorder' => (int)$this->sortorder,
            'idnumber' => (string)$this->idnumber,
        ];
    }

    public function searchableAs()
    {
        return 'question_categories_index';
    }
}
