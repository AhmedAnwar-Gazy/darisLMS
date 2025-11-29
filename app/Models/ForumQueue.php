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
 * Model ForumQueue
 * For keeping track of posts that will be mailed in digest form
 */
class ForumQueue extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'forum_queue';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'discussionid' => 'integer',
        'postid' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function forumDiscussions()
    {
        return $this->belongsTo(ForumDiscussions::class, 'discussionid');
    }

    public function forumPosts()
    {
        return $this->belongsTo(ForumPosts::class, 'postid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'discussionid' => (int)$this->discussionid,
            'postid' => (int)$this->postid,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'forum_queue_index';
    }
}
