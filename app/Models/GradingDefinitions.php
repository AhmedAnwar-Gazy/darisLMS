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
 * Model GradingDefinitions
 * Contains the basic information about an advanced grading form defined in the given gradable area
 */
class GradingDefinitions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grading_definitions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'areaid' => 'integer',
        'method' => 'string',
        'name' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'status' => 'integer',
        'copiedfromid' => 'integer',
        'timecreated' => 'integer',
        'usercreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
        'timecopied' => 'integer',
        'options' => 'string',
    ];

    // Relationships: BelongsTo
    public function gradingAreas()
    {
        return $this->belongsTo(GradingAreas::class, 'areaid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usercreated');
    }

    // Relationships: HasMany
    public function gradingformGuideCommentss()
    {
        return $this->hasMany(GradingformGuideComments::class, 'definitionid');
    }

    public function gradingInstancess()
    {
        return $this->hasMany(GradingInstances::class, 'definitionid');
    }

    public function gradingformGuideCriterias()
    {
        return $this->hasMany(GradingformGuideCriteria::class, 'definitionid');
    }

    public function gradingformRubricCriterias()
    {
        return $this->hasMany(GradingformRubricCriteria::class, 'definitionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'areaid' => (int)$this->areaid,
            'method' => (string)$this->method,
            'name' => (string)$this->name,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'status' => (int)$this->status,
            'copiedfromid' => (int)$this->copiedfromid,
            'timecreated' => (int)$this->timecreated,
            'usercreated' => (int)$this->usercreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
            'timecopied' => (int)$this->timecopied,
            'options' => (string)$this->options,
        ];
    }

    public function searchableAs()
    {
        return 'grading_definitions_index';
    }
}
