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
 * Model QtypeMatchOptions
 * Defines the question-type specific options for matching questions
 */
class QtypeMatchOptions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'qtype_match_options';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionid' => 'integer',
        'shuffleanswers' => 'integer',
        'correctfeedback' => 'string',
        'correctfeedbackformat' => 'integer',
        'partiallycorrectfeedback' => 'string',
        'partiallycorrectfeedbackformat' => 'integer',
        'incorrectfeedback' => 'string',
        'incorrectfeedbackformat' => 'integer',
        'shownumcorrect' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'questionid' => (int)$this->questionid,
            'shuffleanswers' => (int)$this->shuffleanswers,
            'correctfeedback' => (string)$this->correctfeedback,
            'correctfeedbackformat' => (int)$this->correctfeedbackformat,
            'partiallycorrectfeedback' => (string)$this->partiallycorrectfeedback,
            'partiallycorrectfeedbackformat' => (int)$this->partiallycorrectfeedbackformat,
            'incorrectfeedback' => (string)$this->incorrectfeedback,
            'incorrectfeedbackformat' => (int)$this->incorrectfeedbackformat,
            'shownumcorrect' => (int)$this->shownumcorrect,
        ];
    }

    public function searchableAs()
    {
        return 'qtype_match_options_index';
    }
}
