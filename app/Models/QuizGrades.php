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
 * Model QuizGrades
 * Stores the overall grade for each user on the quiz, based on their various attempts and the quiz.grademethod setting.
 */
class QuizGrades extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'quiz_grades';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'quiz' => 'integer',
        'userid' => 'integer',
        'grade' => 'float',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function quizRelation()
    {
        return $this->belongsTo(Quiz::class, 'quiz');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'quiz' => (int)$this->quiz,
            'userid' => (int)$this->userid,
            'grade' => (float)$this->grade,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'quiz_grades_index';
    }
}
