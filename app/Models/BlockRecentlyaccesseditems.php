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
 * Model BlockRecentlyaccesseditems
 * Most recently accessed items accessed by a user
 */
class BlockRecentlyaccesseditems extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'block_recentlyaccesseditems';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'cmid' => 'integer',
        'userid' => 'integer',
        'timeaccess' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function courseModules()
    {
        return $this->belongsTo(CourseModules::class, 'cmid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'cmid' => (int)$this->cmid,
            'userid' => (int)$this->userid,
            'timeaccess' => (int)$this->timeaccess,
        ];
    }

    public function searchableAs()
    {
        return 'block_recentlyaccesseditems_index';
    }
}
