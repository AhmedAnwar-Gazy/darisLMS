<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

/**
 * Model ForumPosts
 * All posts are stored in this table
 */
class ForumPosts extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels, SoftDeletes;

    protected $table = 'forum_posts';
    public $timestamps = false;
    const DELETED_AT = 'deleted';

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'discussion' => 'integer',
        'parent' => 'integer',
        'userid' => 'integer',
        'created' => 'integer',
        'modified' => 'integer',
        'mailed' => 'integer',
        'subject' => 'string',
        'message' => 'string',
        'messageformat' => 'integer',
        'messagetrust' => 'integer',
        'attachment' => 'string',
        'totalscore' => 'integer',
        'mailnow' => 'integer',
        'deleted' => 'boolean',
        'privatereplyto' => 'integer',
        'wordcount' => 'integer',
        'charcount' => 'integer',
    ];

    // Relationships: BelongsTo
    public function forumDiscussions()
    {
        return $this->belongsTo(ForumDiscussions::class, 'discussion');
    }

    public function forumPosts()
    {
        return $this->belongsTo(ForumPosts::class, 'parent');
    }

    // Relationships: HasMany
    public function forumPostss()
    {
        return $this->hasMany(ForumPosts::class, 'parent');
    }

    public function forumQueues()
    {
        return $this->hasMany(ForumQueue::class, 'postid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'discussion' => (int)$this->discussion,
            'parent' => (int)$this->parent,
            'userid' => (int)$this->userid,
            'created' => (int)$this->created,
            'modified' => (int)$this->modified,
            'mailed' => (int)$this->mailed,
            'subject' => (string)$this->subject,
            'message' => (string)$this->message,
            'messageformat' => (int)$this->messageformat,
            'messagetrust' => (int)$this->messagetrust,
            'attachment' => (string)$this->attachment,
            'totalscore' => (int)$this->totalscore,
            'mailnow' => (int)$this->mailnow,
            'deleted' => (int)$this->deleted,
            'privatereplyto' => (int)$this->privatereplyto,
            'wordcount' => (int)$this->wordcount,
            'charcount' => (int)$this->charcount,
        ];
    }

    public function searchableAs()
    {
        return 'forum_posts_index';
    }
}
