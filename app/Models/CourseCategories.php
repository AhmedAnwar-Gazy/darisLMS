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
 * Model CourseCategories
 * Course categories
 */
class CourseCategories extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course_categories';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'idnumber' => 'string',
        'description' => 'string',
        'descriptionformat' => 'integer',
        'parent' => 'integer',
        'sortorder' => 'integer',
        'coursecount' => 'integer',
        'visible' => 'boolean',
        'visibleold' => 'boolean',
        'timemodified' => 'integer',
        'depth' => 'integer',
        'path' => 'string',
        'theme' => 'string',
    ];

    // Relationships: BelongsTo
    public function courseCategories()
    {
        return $this->belongsTo(CourseCategories::class, 'parent');
    }

    // Relationships: HasMany
    public function courseCategoriess()
    {
        return $this->hasMany(CourseCategories::class, 'parent');
    }

    public function toolRecyclebinCategorys()
    {
        return $this->hasMany(ToolRecyclebinCategory::class, 'categoryid');
    }

    public function ltiTypesCategoriess()
    {
        return $this->hasMany(LtiTypesCategories::class, 'categoryid');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'categoryid');
    }

    public function toolBrickfieldAreass()
    {
        return $this->hasMany(ToolBrickfieldAreas::class, 'categoryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'idnumber' => (string)$this->idnumber,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'parent' => (int)$this->parent,
            'sortorder' => (int)$this->sortorder,
            'coursecount' => (int)$this->coursecount,
            'visible' => (int)$this->visible,
            'visibleold' => (int)$this->visibleold,
            'timemodified' => (int)$this->timemodified,
            'depth' => (int)$this->depth,
            'path' => (string)$this->path,
            'theme' => (string)$this->theme,
        ];
    }

    public function searchableAs()
    {
        return 'course_categories_index';
    }
}
