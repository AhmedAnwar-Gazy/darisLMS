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
 * Model QuestionCalculatedOptions
 * Options for questions of type calculated
 */
class QuestionCalculatedOptions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_calculated_options';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'question' => 'integer',
        'synchronize' => 'integer',
        'single' => 'integer',
        'shuffleanswers' => 'integer',
        'correctfeedback' => 'string',
        'correctfeedbackformat' => 'integer',
        'partiallycorrectfeedback' => 'string',
        'partiallycorrectfeedbackformat' => 'integer',
        'incorrectfeedback' => 'string',
        'incorrectfeedbackformat' => 'integer',
        'answernumbering' => 'string',
        'shownumcorrect' => 'integer',
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
            'synchronize' => (int)$this->synchronize,
            'single' => (int)$this->single,
            'shuffleanswers' => (int)$this->shuffleanswers,
            'correctfeedback' => (string)$this->correctfeedback,
            'correctfeedbackformat' => (int)$this->correctfeedbackformat,
            'partiallycorrectfeedback' => (string)$this->partiallycorrectfeedback,
            'partiallycorrectfeedbackformat' => (int)$this->partiallycorrectfeedbackformat,
            'incorrectfeedback' => (string)$this->incorrectfeedback,
            'incorrectfeedbackformat' => (int)$this->incorrectfeedbackformat,
            'answernumbering' => (string)$this->answernumbering,
            'shownumcorrect' => (int)$this->shownumcorrect,
        ];
    }

    public function searchableAs()
    {
        return 'question_calculated_options_index';
    }
}
