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
 * Model Lesson
 * Defines lesson
 */
class Lesson extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'lesson';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'practice' => 'integer',
        'modattempts' => 'integer',
        'usepassword' => 'integer',
        'password' => 'string',
        'dependency' => 'integer',
        'conditions' => 'string',
        'grade' => 'integer',
        'custom' => 'integer',
        'ongoing' => 'integer',
        'usemaxgrade' => 'integer',
        'maxanswers' => 'integer',
        'maxattempts' => 'integer',
        'review' => 'integer',
        'nextpagedefault' => 'integer',
        'feedback' => 'integer',
        'minquestions' => 'integer',
        'maxpages' => 'integer',
        'timelimit' => 'integer',
        'retake' => 'integer',
        'activitylink' => 'integer',
        'mediafile' => 'string',
        'mediaheight' => 'integer',
        'mediawidth' => 'integer',
        'mediaclose' => 'integer',
        'slideshow' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'bgcolor' => 'string',
        'displayleft' => 'integer',
        'displayleftif' => 'integer',
        'progressbar' => 'integer',
        'available' => 'integer',
        'deadline' => 'integer',
        'timemodified' => 'integer',
        'completionendreached' => 'boolean',
        'completiontimespent' => 'integer',
        'allowofflineattempts' => 'boolean',
    ];

    // Relationships: HasMany
    public function lessonTimers()
    {
        return $this->hasMany(LessonTimer::class, 'lessonid');
    }

    public function lessonPagess()
    {
        return $this->hasMany(LessonPages::class, 'lessonid');
    }

    public function lessonGradess()
    {
        return $this->hasMany(LessonGrades::class, 'lessonid');
    }

    public function lessonOverridess()
    {
        return $this->hasMany(LessonOverrides::class, 'lessonid');
    }

    public function lessonBranchs()
    {
        return $this->hasMany(LessonBranch::class, 'lessonid');
    }

    public function lessonAnswerss()
    {
        return $this->hasMany(LessonAnswers::class, 'lessonid');
    }

    public function lessonAttemptss()
    {
        return $this->hasMany(LessonAttempts::class, 'lessonid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'practice' => (int)$this->practice,
            'modattempts' => (int)$this->modattempts,
            'usepassword' => (int)$this->usepassword,
            'password' => (string)$this->password,
            'dependency' => (int)$this->dependency,
            'conditions' => (string)$this->conditions,
            'grade' => (int)$this->grade,
            'custom' => (int)$this->custom,
            'ongoing' => (int)$this->ongoing,
            'usemaxgrade' => (int)$this->usemaxgrade,
            'maxanswers' => (int)$this->maxanswers,
            'maxattempts' => (int)$this->maxattempts,
            'review' => (int)$this->review,
            'nextpagedefault' => (int)$this->nextpagedefault,
            'feedback' => (int)$this->feedback,
            'minquestions' => (int)$this->minquestions,
            'maxpages' => (int)$this->maxpages,
            'timelimit' => (int)$this->timelimit,
            'retake' => (int)$this->retake,
            'activitylink' => (int)$this->activitylink,
            'mediafile' => (string)$this->mediafile,
            'mediaheight' => (int)$this->mediaheight,
            'mediawidth' => (int)$this->mediawidth,
            'mediaclose' => (int)$this->mediaclose,
            'slideshow' => (int)$this->slideshow,
            'width' => (int)$this->width,
            'height' => (int)$this->height,
            'bgcolor' => (string)$this->bgcolor,
            'displayleft' => (int)$this->displayleft,
            'displayleftif' => (int)$this->displayleftif,
            'progressbar' => (int)$this->progressbar,
            'available' => (int)$this->available,
            'deadline' => (int)$this->deadline,
            'timemodified' => (int)$this->timemodified,
            'completionendreached' => (int)$this->completionendreached,
            'completiontimespent' => (int)$this->completiontimespent,
            'allowofflineattempts' => (int)$this->allowofflineattempts,
        ];
    }

    public function searchableAs()
    {
        return 'lesson_index';
    }
}
