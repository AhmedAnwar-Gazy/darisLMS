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
 * Model ScaleHistory
 * History table
 */
class ScaleHistory extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scale_history';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'action' => 'integer',
        'oldid' => 'integer',
        'source' => 'string',
        'timemodified' => 'integer',
        'loggeduser' => 'integer',
        'courseid' => 'integer',
        'userid' => 'integer',
        'name' => 'string',
        'scale' => 'string',
        'description' => 'string',
    ];

    // Relationships: BelongsTo
    public function scale()
    {
        return $this->belongsTo(Scale::class, 'oldid');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'loggeduser');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'action' => (int)$this->action,
            'oldid' => (int)$this->oldid,
            'source' => (string)$this->source,
            'timemodified' => (int)$this->timemodified,
            'loggeduser' => (int)$this->loggeduser,
            'courseid' => (int)$this->courseid,
            'userid' => (int)$this->userid,
            'name' => (string)$this->name,
            'scale' => (string)$this->scale,
            'description' => (string)$this->description,
        ];
    }

    public function searchableAs()
    {
        return 'scale_history_index';
    }
}
