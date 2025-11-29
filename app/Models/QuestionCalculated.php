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
 * Model QuestionCalculated
 * Options for questions of type calculated
 */
class QuestionCalculated extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_calculated';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'question' => 'integer',
        'answer' => 'integer',
        'tolerance' => 'string',
        'tolerancetype' => 'integer',
        'correctanswerlength' => 'integer',
        'correctanswerformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function questionRelation()
    {
        return $this->belongsTo(Question::class, 'question');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'question' => (int)$this->question,
            'answer' => (int)$this->answer,
            'tolerance' => (string)$this->tolerance,
            'tolerancetype' => (int)$this->tolerancetype,
            'correctanswerlength' => (int)$this->correctanswerlength,
            'correctanswerformat' => (int)$this->correctanswerformat,
        ];
    }

    public function searchableAs()
    {
        return 'question_calculated_index';
    }
}
