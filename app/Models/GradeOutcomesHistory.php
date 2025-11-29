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
 * Model GradeOutcomesHistory
 * History table
 */
class GradeOutcomesHistory extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grade_outcomes_history';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'action' => 'integer',
        'oldid' => 'integer',
        'source' => 'string',
        'timemodified' => 'integer',
        'loggeduser' => 'integer',
        'courseid' => 'integer',
        'shortname' => 'string',
        'fullname' => 'string',
        'scaleid' => 'integer',
        'description' => 'string',
        'descriptionformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function gradeOutcomes()
    {
        return $this->belongsTo(GradeOutcomes::class, 'oldid');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function scale()
    {
        return $this->belongsTo(Scale::class, 'scaleid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'loggeduser');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'action' => (int)$this->action,
            'oldid' => (int)$this->oldid,
            'source' => (string)$this->source,
            'timemodified' => (int)$this->timemodified,
            'loggeduser' => (int)$this->loggeduser,
            'courseid' => (int)$this->courseid,
            'shortname' => (string)$this->shortname,
            'fullname' => (string)$this->fullname,
            'scaleid' => (int)$this->scaleid,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
        ];
    }

    public function searchableAs()
    {
        return 'grade_outcomes_history_index';
    }
}
