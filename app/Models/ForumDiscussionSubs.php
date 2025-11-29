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
 * Model ForumDiscussionSubs
 * Users may choose to subscribe and unsubscribe from specific discussions.
 */
class ForumDiscussionSubs extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'forum_discussion_subs';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'forum' => 'integer',
        'userid' => 'integer',
        'discussion' => 'integer',
        'preference' => 'integer',
    ];

    // Relationships: BelongsTo
    public function forumRelation()
    {
        return $this->belongsTo(Forum::class, 'forum');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function forumDiscussions()
    {
        return $this->belongsTo(ForumDiscussions::class, 'discussion');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'forum' => (int)$this->forum,
            'userid' => (int)$this->userid,
            'discussion' => (int)$this->discussion,
            'preference' => (int)$this->preference,
        ];
    }

    public function searchableAs()
    {
        return 'forum_discussion_subs_index';
    }
}
