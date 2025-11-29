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
 * Model QtypeMultichoiceOptions
 * Options for multiple choice questions
 */
class QtypeMultichoiceOptions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'qtype_multichoice_options';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionid' => 'integer',
        'layout' => 'integer',
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
        'showstandardinstruction' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'questionid' => (int)$this->questionid,
            'layout' => (int)$this->layout,
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
            'showstandardinstruction' => (int)$this->showstandardinstruction,
        ];
    }

    public function searchableAs()
    {
        return 'qtype_multichoice_options_index';
    }
}
