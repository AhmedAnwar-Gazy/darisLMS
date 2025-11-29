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
 * Model ForumDiscussions
 * Forums are composed of discussions
 */
class ForumDiscussions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'forum_discussions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'forum' => 'integer',
        'name' => 'string',
        'firstpost' => 'integer',
        'userid' => 'integer',
        'groupid' => 'integer',
        'assessed' => 'boolean',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
        'timestart' => 'integer',
        'timeend' => 'integer',
        'pinned' => 'boolean',
        'timelocked' => 'integer',
    ];

    // Relationships: BelongsTo
    public function forumRelation()
    {
        return $this->belongsTo(Forum::class, 'forum');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Relationships: HasMany
    public function forumPostss()
    {
        return $this->hasMany(ForumPosts::class, 'discussion');
    }

    public function forumDiscussionSubss()
    {
        return $this->hasMany(ForumDiscussionSubs::class, 'discussion');
    }

    public function forumQueues()
    {
        return $this->hasMany(ForumQueue::class, 'discussionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'forum' => (int)$this->forum,
            'name' => (string)$this->name,
            'firstpost' => (int)$this->firstpost,
            'userid' => (int)$this->userid,
            'groupid' => (int)$this->groupid,
            'assessed' => (int)$this->assessed,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
            'timestart' => (int)$this->timestart,
            'timeend' => (int)$this->timeend,
            'pinned' => (int)$this->pinned,
            'timelocked' => (int)$this->timelocked,
        ];
    }

    public function searchableAs()
    {
        return 'forum_discussions_index';
    }
}
