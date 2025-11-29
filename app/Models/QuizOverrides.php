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
 * Model QuizOverrides
 * The overrides to quiz settings on a per-user and per-group basis.
 */
class QuizOverrides extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'quiz_overrides';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'quiz' => 'integer',
        'groupid' => 'integer',
        'userid' => 'integer',
        'timeopen' => 'integer',
        'timeclose' => 'integer',
        'timelimit' => 'integer',
        'attempts' => 'integer',
        'password' => 'string',
    ];

    // Relationships: BelongsTo
    public function quizRelation()
    {
        return $this->belongsTo(Quiz::class, 'quiz');
    }

    public function groups()
    {
        return $this->belongsTo(Groups::class, 'groupid');
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
            'groupid' => (int)$this->groupid,
            'userid' => (int)$this->userid,
            'timeopen' => (int)$this->timeopen,
            'timeclose' => (int)$this->timeclose,
            'timelimit' => (int)$this->timelimit,
            'attempts' => (int)$this->attempts,
            'password' => (string)$this->password,
        ];
    }

    public function searchableAs()
    {
        return 'quiz_overrides_index';
    }
}
