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
 * Model ToolBrickfieldAreas
 * Areas that have been checked for accessibility problems
 */
class ToolBrickfieldAreas extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_brickfield_areas';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        'contextid' => 'integer',
        'component' => 'string',
        'tablename' => 'string',
        'fieldorarea' => 'string',
        'itemid' => 'integer',
        'filename' => 'string',
        'reftable' => 'string',
        'refid' => 'integer',
        'cmid' => 'integer',
        'courseid' => 'integer',
        'categoryid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function courseModules()
    {
        return $this->belongsTo(CourseModules::class, 'cmid');
    }

    public function courseCategories()
    {
        return $this->belongsTo(CourseCategories::class, 'categoryid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function toolBrickfieldContents()
    {
        return $this->hasMany(ToolBrickfieldContent::class, 'areaid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'type' => (int)$this->type,
            'contextid' => (int)$this->contextid,
            'component' => (string)$this->component,
            'tablename' => (string)$this->tablename,
            'fieldorarea' => (string)$this->fieldorarea,
            'itemid' => (int)$this->itemid,
            'filename' => (string)$this->filename,
            'reftable' => (string)$this->reftable,
            'refid' => (int)$this->refid,
            'cmid' => (int)$this->cmid,
            'courseid' => (int)$this->courseid,
            'categoryid' => (int)$this->categoryid,
        ];
    }

    public function searchableAs()
    {
        return 'tool_brickfield_areas_index';
    }
}
