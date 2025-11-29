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
 * Model Groupings
 * A grouping is a collection of groups. WAS: groups_groupings
 */
class Groupings extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'groupings';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'name' => 'string',
        'idnumber' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'configdata' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    // Relationships: HasMany
    public function courseModuless()
    {
        return $this->hasMany(CourseModules::class, 'groupingid');
    }

    public function groupingsGroupss()
    {
        return $this->hasMany(GroupingsGroups::class, 'groupingid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'name' => (string)$this->name,
            'idnumber' => (string)$this->idnumber,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'configdata' => (string)$this->configdata,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'groupings_index';
    }
}
