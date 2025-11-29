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
 * Model FeedbackCompleted
 * filled out feedback
 */
class FeedbackCompleted extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'feedback_completed';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'feedback' => 'integer',
        'userid' => 'integer',
        'timemodified' => 'integer',
        'random_response' => 'integer',
        'anonymous_response' => 'boolean',
        'courseid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function feedbackRelation()
    {
        return $this->belongsTo(Feedback::class, 'feedback');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'feedback' => (int)$this->feedback,
            'userid' => (int)$this->userid,
            'timemodified' => (int)$this->timemodified,
            'random_response' => (int)$this->random_response,
            'anonymous_response' => (int)$this->anonymous_response,
            'courseid' => (int)$this->courseid,
        ];
    }

    public function searchableAs()
    {
        return 'feedback_completed_index';
    }
}
