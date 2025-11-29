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
 * Model UserEnrolments
 * Users participating in courses (aka enrolled users) - everybody who is participating/visible in course, that means both teachers and students
 */
class UserEnrolments extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'user_enrolments';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
        'enrolid' => 'integer',
        'userid' => 'integer',
        'timestart' => 'integer',
        'timeend' => 'integer',
        'modifierid' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function enrol()
    {
        return $this->belongsTo(Enrol::class, 'enrolid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'modifierid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'status' => (int)$this->status,
            'enrolid' => (int)$this->enrolid,
            'userid' => (int)$this->userid,
            'timestart' => (int)$this->timestart,
            'timeend' => (int)$this->timeend,
            'modifierid' => (int)$this->modifierid,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'user_enrolments_index';
    }
}
