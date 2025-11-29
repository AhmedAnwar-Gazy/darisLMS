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
 * Model H5pactivityAttempts
 * Users attempts inside H5P activities
 */
class H5pactivityAttempts extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'h5pactivity_attempts';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'h5pactivityid' => 'integer',
        'userid' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'attempt' => 'integer',
        'rawscore' => 'integer',
        'maxscore' => 'integer',
        'scaled' => 'float',
        'duration' => 'integer',
        'completion' => 'boolean',
        'success' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function h5pactivity()
    {
        return $this->belongsTo(H5pactivity::class, 'h5pactivityid');
    }

    // Relationships: HasMany
    public function h5pactivityAttemptsResultss()
    {
        return $this->hasMany(H5pactivityAttemptsResults::class, 'attemptid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'h5pactivityid' => (int)$this->h5pactivityid,
            'userid' => (int)$this->userid,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'attempt' => (int)$this->attempt,
            'rawscore' => (int)$this->rawscore,
            'maxscore' => (int)$this->maxscore,
            'scaled' => (float)$this->scaled,
            'duration' => (int)$this->duration,
            'completion' => (int)$this->completion,
            'success' => (int)$this->success,
        ];
    }

    public function searchableAs()
    {
        return 'h5pactivity_attempts_index';
    }
}
