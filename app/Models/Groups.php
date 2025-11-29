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
 * Model Groups
 * Each record represents a group.
 */
class Groups extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'groups';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'idnumber' => 'string',
        'name' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'enrolmentkey' => 'string',
        'picture' => 'integer',
        'visibility' => 'boolean',
        'participation' => 'boolean',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    // Relationships: HasMany
    public function lessonOverridess()
    {
        return $this->hasMany(LessonOverrides::class, 'groupid');
    }

    public function groupingsGroupss()
    {
        return $this->hasMany(GroupingsGroups::class, 'groupid');
    }

    public function quizOverridess()
    {
        return $this->hasMany(QuizOverrides::class, 'groupid');
    }

    public function groupsMemberss()
    {
        return $this->hasMany(GroupsMembers::class, 'groupid');
    }

    public function assignOverridess()
    {
        return $this->hasMany(AssignOverrides::class, 'groupid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'idnumber' => (string)$this->idnumber,
            'name' => (string)$this->name,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'enrolmentkey' => (string)$this->enrolmentkey,
            'picture' => (int)$this->picture,
            'visibility' => (int)$this->visibility,
            'participation' => (int)$this->participation,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'groups_index';
    }
}
