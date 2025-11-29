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
 * Model QuestionDatasetDefinitions
 * Organises and stores properties for dataset items
 */
class QuestionDatasetDefinitions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_dataset_definitions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'category' => 'integer',
        'name' => 'string',
        'type' => 'integer',
        'options' => 'string',
        'itemcount' => 'integer',
    ];

    // Relationships: BelongsTo
    public function questionCategories()
    {
        return $this->belongsTo(QuestionCategories::class, 'category');
    }

    // Relationships: HasMany
    public function questionDatasetss()
    {
        return $this->hasMany(QuestionDatasets::class, 'datasetdefinition');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'category' => (int)$this->category,
            'name' => (string)$this->name,
            'type' => (int)$this->type,
            'options' => (string)$this->options,
            'itemcount' => (int)$this->itemcount,
        ];
    }

    public function searchableAs()
    {
        return 'question_dataset_definitions_index';
    }
}
