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
 * Model Course
 * Central course table
 */
class Course extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'category' => 'integer',
        'sortorder' => 'integer',
        'fullname' => 'string',
        'shortname' => 'string',
        'idnumber' => 'string',
        'summary' => 'string',
        'summaryformat' => 'integer',
        'format' => 'string',
        'showgrades' => 'integer',
        'newsitems' => 'integer',
        'startdate' => 'integer',
        'enddate' => 'integer',
        'relativedatesmode' => 'boolean',
        'marker' => 'integer',
        'maxbytes' => 'integer',
        'legacyfiles' => 'integer',
        'showreports' => 'integer',
        'visible' => 'boolean',
        'visibleold' => 'boolean',
        'downloadcontent' => 'boolean',
        'groupmode' => 'integer',
        'groupmodeforce' => 'integer',
        'defaultgroupingid' => 'integer',
        'lang' => 'string',
        'calendartype' => 'string',
        'theme' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'requested' => 'boolean',
        'enablecompletion' => 'boolean',
        'completionnotify' => 'boolean',
        'cacherev' => 'integer',
        'originalcourseid' => 'integer',
        'showactivitydates' => 'boolean',
        'showcompletionconditions' => 'boolean',
        'pdfexportfont' => 'string',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'originalcourseid');
    }

    // Relationships: HasMany
    public function courses()
    {
        return $this->hasMany(Course::class, 'originalcourseid');
    }

    public function toolBrickfieldCacheChecks()
    {
        return $this->hasMany(ToolBrickfieldCacheCheck::class, 'courseid');
    }

    public function toolBrickfieldSummarys()
    {
        return $this->hasMany(ToolBrickfieldSummary::class, 'courseid');
    }

    public function gradeCategoriess()
    {
        return $this->hasMany(GradeCategories::class, 'courseid');
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class, 'course');
    }

    public function coursePublisheds()
    {
        return $this->hasMany(CoursePublished::class, 'courseid');
    }

    public function groupingss()
    {
        return $this->hasMany(Groupings::class, 'courseid');
    }

    public function toolRecyclebinCourses()
    {
        return $this->hasMany(ToolRecyclebinCourse::class, 'courseid');
    }

    public function gradeSettingss()
    {
        return $this->hasMany(GradeSettings::class, 'courseid');
    }

    public function groupss()
    {
        return $this->hasMany(Groups::class, 'courseid');
    }

    public function h5pactivitys()
    {
        return $this->hasMany(H5pactivity::class, 'course');
    }

    public function toolBrickfieldCacheActss()
    {
        return $this->hasMany(ToolBrickfieldCacheActs::class, 'courseid');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'course');
    }

    public function courseFormatOptionss()
    {
        return $this->hasMany(CourseFormatOptions::class, 'courseid');
    }

    public function courseCompletionDefaultss()
    {
        return $this->hasMany(CourseCompletionDefaults::class, 'course');
    }

    public function eventSubscriptionss()
    {
        return $this->hasMany(EventSubscriptions::class, 'courseid');
    }

    public function badges()
    {
        return $this->hasMany(Badge::class, 'courseid');
    }

    public function enrolFlatfiles()
    {
        return $this->hasMany(EnrolFlatfile::class, 'courseid');
    }

    public function enrols()
    {
        return $this->hasMany(Enrol::class, 'courseid');
    }

    public function toolMonitorEventss()
    {
        return $this->hasMany(ToolMonitorEvents::class, 'courseid');
    }

    public function logstoreStandardLogs()
    {
        return $this->hasMany(LogstoreStandardLog::class, 'courseid');
    }

    public function chatUserss()
    {
        return $this->hasMany(ChatUsers::class, 'course');
    }

    public function feedbackCompleteds()
    {
        return $this->hasMany(FeedbackCompleted::class, 'courseid');
    }

    public function ltiToolSettingss()
    {
        return $this->hasMany(LtiToolSettings::class, 'course');
    }

    public function gradeCategoriesHistorys()
    {
        return $this->hasMany(GradeCategoriesHistory::class, 'courseid');
    }

    public function gradeOutcomess()
    {
        return $this->hasMany(GradeOutcomes::class, 'courseid');
    }

    public function scaleHistorys()
    {
        return $this->hasMany(ScaleHistory::class, 'courseid');
    }

    public function enrolPaypals()
    {
        return $this->hasMany(EnrolPaypal::class, 'courseid');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'courseid');
    }

    public function blockRecentlyaccesseditemss()
    {
        return $this->hasMany(BlockRecentlyaccesseditems::class, 'courseid');
    }

    public function toolBrickfieldAreass()
    {
        return $this->hasMany(ToolBrickfieldAreas::class, 'courseid');
    }

    public function gradeOutcomesHistorys()
    {
        return $this->hasMany(GradeOutcomesHistory::class, 'courseid');
    }

    public function gradeOutcomesCoursess()
    {
        return $this->hasMany(GradeOutcomesCourses::class, 'courseid');
    }

    public function gradeItemss()
    {
        return $this->hasMany(GradeItems::class, 'courseid');
    }

    public function competencyCoursecomps()
    {
        return $this->hasMany(CompetencyCoursecomp::class, 'courseid');
    }

    public function gradeItemsHistorys()
    {
        return $this->hasMany(GradeItemsHistory::class, 'courseid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'category' => (int)$this->category,
            'sortorder' => (int)$this->sortorder,
            'fullname' => (string)$this->fullname,
            'shortname' => (string)$this->shortname,
            'idnumber' => (string)$this->idnumber,
            'summary' => (string)$this->summary,
            'summaryformat' => (int)$this->summaryformat,
            'format' => (string)$this->format,
            'showgrades' => (int)$this->showgrades,
            'newsitems' => (int)$this->newsitems,
            'startdate' => (int)$this->startdate,
            'enddate' => (int)$this->enddate,
            'relativedatesmode' => (int)$this->relativedatesmode,
            'marker' => (int)$this->marker,
            'maxbytes' => (int)$this->maxbytes,
            'legacyfiles' => (int)$this->legacyfiles,
            'showreports' => (int)$this->showreports,
            'visible' => (int)$this->visible,
            'visibleold' => (int)$this->visibleold,
            'downloadcontent' => (int)$this->downloadcontent,
            'groupmode' => (int)$this->groupmode,
            'groupmodeforce' => (int)$this->groupmodeforce,
            'defaultgroupingid' => (int)$this->defaultgroupingid,
            'lang' => (string)$this->lang,
            'calendartype' => (string)$this->calendartype,
            'theme' => (string)$this->theme,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'requested' => (int)$this->requested,
            'enablecompletion' => (int)$this->enablecompletion,
            'completionnotify' => (int)$this->completionnotify,
            'cacherev' => (int)$this->cacherev,
            'originalcourseid' => (int)$this->originalcourseid,
            'showactivitydates' => (int)$this->showactivitydates,
            'showcompletionconditions' => (int)$this->showcompletionconditions,
            'pdfexportfont' => (string)$this->pdfexportfont,
        ];
    }

    public function searchableAs()
    {
        return 'course_index';
    }
}
