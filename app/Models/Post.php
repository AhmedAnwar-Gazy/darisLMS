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
 * Model Post
 * Generic post table to hold data blog entries etc in different modules
 */
class Post extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'post';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'module' => 'string',
        'userid' => 'integer',
        'courseid' => 'integer',
        'groupid' => 'integer',
        'moduleid' => 'integer',
        'coursemoduleid' => 'integer',
        'subject' => 'string',
        'summary' => 'string',
        'content' => 'string',
        'uniquehash' => 'string',
        'rating' => 'integer',
        'format' => 'integer',
        'summaryformat' => 'integer',
        'attachment' => 'string',
        'publishstate' => 'string',
        'lastmodified' => 'integer',
        'created' => 'integer',
        'usermodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function courseModules()
    {
        return $this->belongsTo(CourseModules::class, 'coursemoduleid');
    }

    // Relationships: HasMany
    public function blogAssociations()
    {
        return $this->hasMany(BlogAssociation::class, 'blogid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'module' => (string)$this->module,
            'userid' => (int)$this->userid,
            'courseid' => (int)$this->courseid,
            'groupid' => (int)$this->groupid,
            'moduleid' => (int)$this->moduleid,
            'coursemoduleid' => (int)$this->coursemoduleid,
            'subject' => (string)$this->subject,
            'summary' => (string)$this->summary,
            'content' => (string)$this->content,
            'uniquehash' => (string)$this->uniquehash,
            'rating' => (int)$this->rating,
            'format' => (int)$this->format,
            'summaryformat' => (int)$this->summaryformat,
            'attachment' => (string)$this->attachment,
            'publishstate' => (string)$this->publishstate,
            'lastmodified' => (int)$this->lastmodified,
            'created' => (int)$this->created,
            'usermodified' => (int)$this->usermodified,
        ];
    }

    public function searchableAs()
    {
        return 'post_index';
    }
}
