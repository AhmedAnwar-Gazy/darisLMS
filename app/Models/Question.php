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
 * Model Question
 * This table stores the definition of one version of a question.
 */
class Question extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'parent' => 'integer',
        'name' => 'string',
        'questiontext' => 'string',
        'questiontextformat' => 'integer',
        'generalfeedback' => 'string',
        'generalfeedbackformat' => 'integer',
        'defaultmark' => 'float',
        'penalty' => 'float',
        'qtype' => 'string',
        'length' => 'integer',
        'stamp' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'createdby' => 'integer',
        'modifiedby' => 'integer',
    ];

    // Relationships: BelongsTo
    public function question()
    {
        return $this->belongsTo(Question::class, 'parent');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'createdby');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'modifiedby');
    }

    // Relationships: HasMany
    public function questions()
    {
        return $this->hasMany(Question::class, 'parent');
    }

    public function qtypeDdmarkerDragss()
    {
        return $this->hasMany(QtypeDdmarkerDrags::class, 'questionid');
    }

    public function qtypeMatchSubquestionss()
    {
        return $this->hasMany(QtypeMatchSubquestions::class, 'questionid');
    }

    public function questionNumericalOptionss()
    {
        return $this->hasMany(QuestionNumericalOptions::class, 'question');
    }

    public function questionResponseAnalysiss()
    {
        return $this->hasMany(QuestionResponseAnalysis::class, 'questionid');
    }

    public function questionNumericalUnitss()
    {
        return $this->hasMany(QuestionNumericalUnits::class, 'question');
    }

    public function questionMultianswers()
    {
        return $this->hasMany(QuestionMultianswer::class, 'question');
    }

    public function questionCalculatedOptionss()
    {
        return $this->hasMany(QuestionCalculatedOptions::class, 'question');
    }

    public function qtypeDdmarkerDropss()
    {
        return $this->hasMany(QtypeDdmarkerDrops::class, 'questionid');
    }

    public function questionStatisticss()
    {
        return $this->hasMany(QuestionStatistics::class, 'questionid');
    }

    public function questionNumericals()
    {
        return $this->hasMany(QuestionNumerical::class, 'question');
    }

    public function questionAnswerss()
    {
        return $this->hasMany(QuestionAnswers::class, 'question');
    }

    public function qtypeDdmarkers()
    {
        return $this->hasMany(QtypeDdmarker::class, 'questionid');
    }

    public function questionTruefalses()
    {
        return $this->hasMany(QuestionTruefalse::class, 'question');
    }

    public function questionCalculateds()
    {
        return $this->hasMany(QuestionCalculated::class, 'question');
    }

    public function qtypeDdimageortextDragss()
    {
        return $this->hasMany(QtypeDdimageortextDrags::class, 'questionid');
    }

    public function questionHintss()
    {
        return $this->hasMany(QuestionHints::class, 'questionid');
    }

    public function questionDdwtoss()
    {
        return $this->hasMany(QuestionDdwtos::class, 'questionid');
    }

    public function qtypeDdimageortextDropss()
    {
        return $this->hasMany(QtypeDdimageortextDrops::class, 'questionid');
    }

    public function qtypeDdimageortexts()
    {
        return $this->hasMany(QtypeDdimageortext::class, 'questionid');
    }

    public function questionGapselects()
    {
        return $this->hasMany(QuestionGapselect::class, 'questionid');
    }

    public function questionAttemptss()
    {
        return $this->hasMany(QuestionAttempts::class, 'questionid');
    }

    public function questionVersionss()
    {
        return $this->hasMany(QuestionVersions::class, 'questionid');
    }

    public function questionDatasetss()
    {
        return $this->hasMany(QuestionDatasets::class, 'question');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'parent' => (int)$this->parent,
            'name' => (string)$this->name,
            'questiontext' => (string)$this->questiontext,
            'questiontextformat' => (int)$this->questiontextformat,
            'generalfeedback' => (string)$this->generalfeedback,
            'generalfeedbackformat' => (int)$this->generalfeedbackformat,
            'defaultmark' => (float)$this->defaultmark,
            'penalty' => (float)$this->penalty,
            'qtype' => (string)$this->qtype,
            'length' => (int)$this->length,
            'stamp' => (string)$this->stamp,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'createdby' => (int)$this->createdby,
            'modifiedby' => (int)$this->modifiedby,
        ];
    }

    public function searchableAs()
    {
        return 'question_index';
    }
}
