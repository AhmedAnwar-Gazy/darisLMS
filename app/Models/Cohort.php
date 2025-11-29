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
 * Model Cohort
 * Each record represents one cohort (aka site-wide group).
 */
class Cohort extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'cohort';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextid' => 'integer',
        'name' => 'string',
        'idnumber' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'visible' => 'boolean',
        'component' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'theme' => 'string',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function cohortMemberss()
    {
        return $this->hasMany(CohortMembers::class, 'cohortid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextid' => (int)$this->contextid,
            'name' => (string)$this->name,
            'idnumber' => (string)$this->idnumber,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'visible' => (int)$this->visible,
            'component' => (string)$this->component,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'theme' => (string)$this->theme,
        ];
    }

    public function searchableAs()
    {
        return 'cohort_index';
    }
}
