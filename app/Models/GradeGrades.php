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
 * Model GradeGrades
 * grade_grades  This table keeps individual grades for each user and each item, exactly as imported or submitted by modules. The rawgrademax/min and rawscaleid are stored here to record the values at the time the grade was stored, because teachers might change this for an activity! All the results are normalised/resampled for the final grade value.
 */
class GradeGrades extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grade_grades';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
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
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'aggregationstatus' => 'string',
        'aggregationweight' => 'float',
    ];

    // Relationships: BelongsTo
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

    // Relationships: HasMany
    public function gradeGradesHistorys()
    {
        return $this->hasMany(GradeGradesHistory::class, 'oldid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
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
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'aggregationstatus' => (string)$this->aggregationstatus,
            'aggregationweight' => (float)$this->aggregationweight,
        ];
    }

    public function searchableAs()
    {
        return 'grade_grades_index';
    }
}
