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
 * Model GradeItemsHistory
 * History of grade_items
 */
class GradeItemsHistory extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grade_items_history';
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
        'hidden' => 'integer',
        'locked' => 'integer',
        'locktime' => 'integer',
        'needsupdate' => 'integer',
        'display' => 'integer',
        'decimals' => 'boolean',
        'weightoverride' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function gradeItems()
    {
        return $this->belongsTo(GradeItems::class, 'oldid');
    }

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
            'hidden' => (int)$this->hidden,
            'locked' => (int)$this->locked,
            'locktime' => (int)$this->locktime,
            'needsupdate' => (int)$this->needsupdate,
            'display' => (int)$this->display,
            'decimals' => (int)$this->decimals,
            'weightoverride' => (int)$this->weightoverride,
        ];
    }

    public function searchableAs()
    {
        return 'grade_items_history_index';
    }
}
