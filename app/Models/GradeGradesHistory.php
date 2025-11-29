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
 * Model GradeGradesHistory
 * History table
 */
class GradeGradesHistory extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grade_grades_history';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'action' => 'integer',
        'oldid' => 'integer',
        'source' => 'string',
        'timemodified' => 'integer',
        'loggeduser' => 'integer',
        'itemid' => 'integer',
        'userid' => 'integer',
        'rawgrade' => 'float',
        'rawgrademax' => 'float',
        'rawgrademin' => 'float',
        'rawscaleid' => 'integer',
        'usermodified' => 'integer',
        'finalgrade' => 'float',
        'hidden' => 'integer',
        'locked' => 'integer',
        'locktime' => 'integer',
        'exported' => 'integer',
        'overridden' => 'integer',
        'excluded' => 'integer',
        'feedback' => 'string',
        'feedbackformat' => 'integer',
        'information' => 'string',
        'informationformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function gradeGrades()
    {
        return $this->belongsTo(GradeGrades::class, 'oldid');
    }

    public function gradeItems()
    {
        return $this->belongsTo(GradeItems::class, 'itemid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function scale()
    {
        return $this->belongsTo(Scale::class, 'rawscaleid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
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
            'itemid' => (int)$this->itemid,
            'userid' => (int)$this->userid,
            'rawgrade' => (float)$this->rawgrade,
            'rawgrademax' => (float)$this->rawgrademax,
            'rawgrademin' => (float)$this->rawgrademin,
            'rawscaleid' => (int)$this->rawscaleid,
            'usermodified' => (int)$this->usermodified,
            'finalgrade' => (float)$this->finalgrade,
            'hidden' => (int)$this->hidden,
            'locked' => (int)$this->locked,
            'locktime' => (int)$this->locktime,
            'exported' => (int)$this->exported,
            'overridden' => (int)$this->overridden,
            'excluded' => (int)$this->excluded,
            'feedback' => (string)$this->feedback,
            'feedbackformat' => (int)$this->feedbackformat,
            'information' => (string)$this->information,
            'informationformat' => (int)$this->informationformat,
        ];
    }

    public function searchableAs()
    {
        return 'grade_grades_history_index';
    }
}
