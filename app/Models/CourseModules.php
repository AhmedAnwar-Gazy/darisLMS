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
 * Model CourseModules
 * course_modules table retrofitted from MySQL
 */
class CourseModules extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course_modules';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'module' => 'integer',
        'instance' => 'integer',
        'section' => 'integer',
        'idnumber' => 'string',
        'added' => 'integer',
        'score' => 'integer',
        'indent' => 'integer',
        'visible' => 'boolean',
        'visibleoncoursepage' => 'boolean',
        'visibleold' => 'boolean',
        'groupmode' => 'integer',
        'groupingid' => 'integer',
        'completion' => 'boolean',
        'completiongradeitemnumber' => 'integer',
        'completionview' => 'boolean',
        'completionexpected' => 'integer',
        'completionpassgrade' => 'boolean',
        'showdescription' => 'boolean',
        'availability' => 'string',
        'deletioninprogress' => 'boolean',
        'downloadcontent' => 'boolean',
        'lang' => 'string',
    ];

    // Relationships: BelongsTo
    public function groupings()
    {
        return $this->belongsTo(Groupings::class, 'groupingid');
    }

    // Relationships: HasMany
    public function posts()
    {
        return $this->hasMany(Post::class, 'coursemoduleid');
    }

    public function blockRecentlyaccesseditemss()
    {
        return $this->hasMany(BlockRecentlyaccesseditems::class, 'cmid');
    }

    public function toolBrickfieldAreass()
    {
        return $this->hasMany(ToolBrickfieldAreas::class, 'cmid');
    }

    public function competencyModulecomps()
    {
        return $this->hasMany(CompetencyModulecomp::class, 'cmid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'module' => (int)$this->module,
            'instance' => (int)$this->instance,
            'section' => (int)$this->section,
            'idnumber' => (string)$this->idnumber,
            'added' => (int)$this->added,
            'score' => (int)$this->score,
            'indent' => (int)$this->indent,
            'visible' => (int)$this->visible,
            'visibleoncoursepage' => (int)$this->visibleoncoursepage,
            'visibleold' => (int)$this->visibleold,
            'groupmode' => (int)$this->groupmode,
            'groupingid' => (int)$this->groupingid,
            'completion' => (int)$this->completion,
            'completiongradeitemnumber' => (int)$this->completiongradeitemnumber,
            'completionview' => (int)$this->completionview,
            'completionexpected' => (int)$this->completionexpected,
            'completionpassgrade' => (int)$this->completionpassgrade,
            'showdescription' => (int)$this->showdescription,
            'availability' => (string)$this->availability,
            'deletioninprogress' => (int)$this->deletioninprogress,
            'downloadcontent' => (int)$this->downloadcontent,
            'lang' => (string)$this->lang,
        ];
    }

    public function searchableAs()
    {
        return 'course_modules_index';
    }
}
