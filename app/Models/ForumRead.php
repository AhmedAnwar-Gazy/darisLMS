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
 * Model ForumRead
 * Tracks each users read posts
 */
class ForumRead extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'forum_read';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'forumid' => 'integer',
        'discussionid' => 'integer',
        'postid' => 'integer',
        'firstread' => 'integer',
        'lastread' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'forumid' => (int)$this->forumid,
            'discussionid' => (int)$this->discussionid,
            'postid' => (int)$this->postid,
            'firstread' => (int)$this->firstread,
            'lastread' => (int)$this->lastread,
        ];
    }

    public function searchableAs()
    {
        return 'forum_read_index';
    }
}
