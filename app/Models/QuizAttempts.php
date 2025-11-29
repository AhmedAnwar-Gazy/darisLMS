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
 * Model QuizAttempts
 * Stores users attempts at quizzes.
 */
class QuizAttempts extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'quiz_attempts';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'quiz' => 'integer',
        'userid' => 'integer',
        'attempt' => 'integer',
        'uniqueid' => 'integer',
        'layout' => 'string',
        'currentpage' => 'integer',
        'preview' => 'integer',
        'state' => 'string',
        'timestart' => 'integer',
        'timefinish' => 'integer',
        'timemodified' => 'integer',
        'timemodifiedoffline' => 'integer',
        'timecheckstate' => 'integer',
        'sumgrades' => 'float',
        'gradednotificationsenttime' => 'integer',
    ];

    // Relationships: BelongsTo
    public function quizRelation()
    {
        return $this->belongsTo(Quiz::class, 'quiz');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'quiz' => (int)$this->quiz,
            'userid' => (int)$this->userid,
            'attempt' => (int)$this->attempt,
            'uniqueid' => (int)$this->uniqueid,
            'layout' => (string)$this->layout,
            'currentpage' => (int)$this->currentpage,
            'preview' => (int)$this->preview,
            'state' => (string)$this->state,
            'timestart' => (int)$this->timestart,
            'timefinish' => (int)$this->timefinish,
            'timemodified' => (int)$this->timemodified,
            'timemodifiedoffline' => (int)$this->timemodifiedoffline,
            'timecheckstate' => (int)$this->timecheckstate,
            'sumgrades' => (float)$this->sumgrades,
            'gradednotificationsenttime' => (int)$this->gradednotificationsenttime,
        ];
    }

    public function searchableAs()
    {
        return 'quiz_attempts_index';
    }
}
