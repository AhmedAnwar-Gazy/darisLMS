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
 * Model QuestionAttemptSteps
 * Stores one step in in a question attempt. As well as the data here, the step will have some data in the question_attempt_step_data table.
 */
class QuestionAttemptSteps extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_attempt_steps';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionattemptid' => 'integer',
        'sequencenumber' => 'integer',
        'state' => 'string',
        'fraction' => 'float',
        'timecreated' => 'integer',
        'userid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function questionAttempts()
    {
        return $this->belongsTo(QuestionAttempts::class, 'questionattemptid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Relationships: HasMany
    public function questionAttemptStepDatas()
    {
        return $this->hasMany(QuestionAttemptStepData::class, 'attemptstepid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'questionattemptid' => (int)$this->questionattemptid,
            'sequencenumber' => (int)$this->sequencenumber,
            'state' => (string)$this->state,
            'fraction' => (float)$this->fraction,
            'timecreated' => (int)$this->timecreated,
            'userid' => (int)$this->userid,
        ];
    }

    public function searchableAs()
    {
        return 'question_attempt_steps_index';
    }
}
