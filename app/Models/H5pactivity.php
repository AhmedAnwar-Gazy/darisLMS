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
 * Model H5pactivity
 * Stores the h5pactivity activity module instances.
 */
class H5pactivity extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'h5pactivity';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'intro' => 'string',
        'introformat' => 'integer',
        'grade' => 'integer',
        'displayoptions' => 'integer',
        'enabletracking' => 'boolean',
        'grademethod' => 'integer',
        'reviewmode' => 'integer',
    ];

    // Relationships: BelongsTo
    public function courseRelation()
    {
        return $this->belongsTo(Course::class, 'course');
    }

    // Relationships: HasMany
    public function h5pactivityAttemptss()
    {
        return $this->hasMany(H5pactivityAttempts::class, 'h5pactivityid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'grade' => (int)$this->grade,
            'displayoptions' => (int)$this->displayoptions,
            'enabletracking' => (int)$this->enabletracking,
            'grademethod' => (int)$this->grademethod,
            'reviewmode' => (int)$this->reviewmode,
        ];
    }

    public function searchableAs()
    {
        return 'h5pactivity_index';
    }
}
