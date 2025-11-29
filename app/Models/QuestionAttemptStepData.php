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
 * Model QuestionAttemptStepData
 * Each question_attempt_step has an associative array of the data that was submitted by the user in the POST request. It can also contain extra data from the question type or behaviour to avoid re-computation. The convention is that names belonging to the behaviour start with -, and cached values added to the submitted data start with _, or _-
 */
class QuestionAttemptStepData extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_attempt_step_data';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'attemptstepid' => 'integer',
        'name' => 'string',
        'value' => 'string',
    ];

    // Relationships: BelongsTo
    public function questionAttemptSteps()
    {
        return $this->belongsTo(QuestionAttemptSteps::class, 'attemptstepid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'attemptstepid' => (int)$this->attemptstepid,
            'name' => (string)$this->name,
            'value' => (string)$this->value,
        ];
    }

    public function searchableAs()
    {
        return 'question_attempt_step_data_index';
    }
}
