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
 * Model QuestionDatasets
 * Many-many relation between questions and dataset definitions
 */
class QuestionDatasets extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_datasets';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'question' => 'integer',
        'datasetdefinition' => 'integer',
    ];

    // Relationships: BelongsTo
    public function questionRelation()
    {
        return $this->belongsTo(Question::class, 'question');
    }

    public function questionDatasetDefinitions()
    {
        return $this->belongsTo(QuestionDatasetDefinitions::class, 'datasetdefinition');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'question' => (int)$this->question,
            'datasetdefinition' => (int)$this->datasetdefinition,
        ];
    }

    public function searchableAs()
    {
        return 'question_datasets_index';
    }
}
