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
 * Model EnrolFlatfile
 * enrol_flatfile table retrofitted from MySQL
 */
class EnrolFlatfile extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'enrol_flatfile';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'action' => 'string',
        'roleid' => 'integer',
        'userid' => 'integer',
        'courseid' => 'integer',
        'timestart' => 'integer',
        'timeend' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'action' => (string)$this->action,
            'roleid' => (int)$this->roleid,
            'userid' => (int)$this->userid,
            'courseid' => (int)$this->courseid,
            'timestart' => (int)$this->timestart,
            'timeend' => (int)$this->timeend,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'enrol_flatfile_index';
    }
}
