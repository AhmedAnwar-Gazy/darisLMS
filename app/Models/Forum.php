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
 * Model Forum
 * Forums contain and structure discussion
 */
class Forum extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'forum';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'type' => 'string',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'duedate' => 'integer',
        'cutoffdate' => 'integer',
        'assessed' => 'integer',
        'assesstimestart' => 'integer',
        'assesstimefinish' => 'integer',
        'scale' => 'integer',
        'grade_forum' => 'integer',
        'grade_forum_notify' => 'integer',
        'maxbytes' => 'integer',
        'maxattachments' => 'integer',
        'forcesubscribe' => 'boolean',
        'trackingtype' => 'integer',
        'rsstype' => 'integer',
        'rssarticles' => 'integer',
        'timemodified' => 'integer',
        'warnafter' => 'integer',
        'blockafter' => 'integer',
        'blockperiod' => 'integer',
        'completiondiscussions' => 'integer',
        'completionreplies' => 'integer',
        'completionposts' => 'integer',
        'displaywordcount' => 'boolean',
        'lockdiscussionafter' => 'integer',
    ];

    // Relationships: HasMany
    public function forumDiscussionss()
    {
        return $this->hasMany(ForumDiscussions::class, 'forum');
    }

    public function forumGradess()
    {
        return $this->hasMany(ForumGrades::class, 'forum');
    }

    public function forumDigestss()
    {
        return $this->hasMany(ForumDigests::class, 'forum');
    }

    public function forumSubscriptionss()
    {
        return $this->hasMany(ForumSubscriptions::class, 'forum');
    }

    public function forumDiscussionSubss()
    {
        return $this->hasMany(ForumDiscussionSubs::class, 'forum');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'type' => (string)$this->type,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'duedate' => (int)$this->duedate,
            'cutoffdate' => (int)$this->cutoffdate,
            'assessed' => (int)$this->assessed,
            'assesstimestart' => (int)$this->assesstimestart,
            'assesstimefinish' => (int)$this->assesstimefinish,
            'scale' => (int)$this->scale,
            'grade_forum' => (int)$this->grade_forum,
            'grade_forum_notify' => (int)$this->grade_forum_notify,
            'maxbytes' => (int)$this->maxbytes,
            'maxattachments' => (int)$this->maxattachments,
            'forcesubscribe' => (int)$this->forcesubscribe,
            'trackingtype' => (int)$this->trackingtype,
            'rsstype' => (int)$this->rsstype,
            'rssarticles' => (int)$this->rssarticles,
            'timemodified' => (int)$this->timemodified,
            'warnafter' => (int)$this->warnafter,
            'blockafter' => (int)$this->blockafter,
            'blockperiod' => (int)$this->blockperiod,
            'completiondiscussions' => (int)$this->completiondiscussions,
            'completionreplies' => (int)$this->completionreplies,
            'completionposts' => (int)$this->completionposts,
            'displaywordcount' => (int)$this->displaywordcount,
            'lockdiscussionafter' => (int)$this->lockdiscussionafter,
        ];
    }

    public function searchableAs()
    {
        return 'forum_index';
    }
}
