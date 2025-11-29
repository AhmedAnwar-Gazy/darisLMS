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
 * Model GradeItems
 * This table keeps information about gradeable items (ie columns). If an activity (eg an assignment or quiz) has multiple grade_items associated with it (eg several outcomes or numerical grades), then there will be a corresponding multiple number of rows in this table.
 */
class GradeItems extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grade_items';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'categoryid' => 'integer',
        'itemname' => 'string',
        'itemtype' => 'string',
        'itemmodule' => 'string',
        'iteminstance' => 'integer',
        'itemnumber' => 'integer',
        'iteminfo' => 'string',
        'idnumber' => 'string',
        'calculation' => 'string',
        'gradetype' => 'integer',
        'grademax' => 'float',
        'grademin' => 'float',
        'scaleid' => 'integer',
        'outcomeid' => 'integer',
        'gradepass' => 'float',
        'multfactor' => 'float',
        'plusfactor' => 'float',
        'aggregationcoef' => 'float',
        'aggregationcoef2' => 'float',
        'sortorder' => 'integer',
        'display' => 'integer',
        'decimals' => 'boolean',
        'hidden' => 'integer',
        'locked' => 'integer',
        'locktime' => 'integer',
        'needsupdate' => 'integer',
        'weightoverride' => 'boolean',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function gradeCategories()
    {
        return $this->belongsTo(GradeCategories::class, 'categoryid');
    }

    public function scale()
    {
        return $this->belongsTo(Scale::class, 'scaleid');
    }

    public function gradeOutcomes()
    {
        return $this->belongsTo(GradeOutcomes::class, 'outcomeid');
    }

    // Relationships: HasMany
    public function gradeImportValuess()
    {
        return $this->hasMany(GradeImportValues::class, 'itemid');
    }

    public function gradeGradess()
    {
        return $this->hasMany(GradeGrades::class, 'itemid');
    }

    public function gradeItemsHistorys()
    {
        return $this->hasMany(GradeItemsHistory::class, 'oldid');
    }

    public function ltiserviceGradebookservicess()
    {
        return $this->hasMany(LtiserviceGradebookservices::class, 'gradeitemid');
    }

    public function gradeGradesHistorys()
    {
        return $this->hasMany(GradeGradesHistory::class, 'itemid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'categoryid' => (int)$this->categoryid,
            'itemname' => (string)$this->itemname,
            'itemtype' => (string)$this->itemtype,
            'itemmodule' => (string)$this->itemmodule,
            'iteminstance' => (int)$this->iteminstance,
            'itemnumber' => (int)$this->itemnumber,
            'iteminfo' => (string)$this->iteminfo,
            'idnumber' => (string)$this->idnumber,
            'calculation' => (string)$this->calculation,
            'gradetype' => (int)$this->gradetype,
            'grademax' => (float)$this->grademax,
            'grademin' => (float)$this->grademin,
            'scaleid' => (int)$this->scaleid,
            'outcomeid' => (int)$this->outcomeid,
            'gradepass' => (float)$this->gradepass,
            'multfactor' => (float)$this->multfactor,
            'plusfactor' => (float)$this->plusfactor,
            'aggregationcoef' => (float)$this->aggregationcoef,
            'aggregationcoef2' => (float)$this->aggregationcoef2,
            'sortorder' => (int)$this->sortorder,
            'display' => (int)$this->display,
            'decimals' => (int)$this->decimals,
            'hidden' => (int)$this->hidden,
            'locked' => (int)$this->locked,
            'locktime' => (int)$this->locktime,
            'needsupdate' => (int)$this->needsupdate,
            'weightoverride' => (int)$this->weightoverride,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'grade_items_index';
    }
}
