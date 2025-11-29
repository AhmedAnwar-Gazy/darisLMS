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
 * Model GradeCategories
 * This table keeps information about categories, used for grouping items.
 */
class GradeCategories extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grade_categories';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'parent' => 'integer',
        'depth' => 'integer',
        'path' => 'string',
        'fullname' => 'string',
        'aggregation' => 'integer',
        'keephigh' => 'integer',
        'droplow' => 'integer',
        'aggregateonlygraded' => 'boolean',
        'aggregateoutcomes' => 'boolean',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'hidden' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function gradeCategories()
    {
        return $this->belongsTo(GradeCategories::class, 'parent');
    }

    // Relationships: HasMany
    public function gradeCategoriess()
    {
        return $this->hasMany(GradeCategories::class, 'parent');
    }

    public function gradeCategoriesHistorys()
    {
        return $this->hasMany(GradeCategoriesHistory::class, 'oldid');
    }

    public function gradeCategoriesHistorys()
    {
        return $this->hasMany(GradeCategoriesHistory::class, 'parent');
    }

    public function gradeItemss()
    {
        return $this->hasMany(GradeItems::class, 'categoryid');
    }

    public function gradeItemsHistorys()
    {
        return $this->hasMany(GradeItemsHistory::class, 'categoryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'parent' => (int)$this->parent,
            'depth' => (int)$this->depth,
            'path' => (string)$this->path,
            'fullname' => (string)$this->fullname,
            'aggregation' => (int)$this->aggregation,
            'keephigh' => (int)$this->keephigh,
            'droplow' => (int)$this->droplow,
            'aggregateonlygraded' => (int)$this->aggregateonlygraded,
            'aggregateoutcomes' => (int)$this->aggregateoutcomes,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'hidden' => (int)$this->hidden,
        ];
    }

    public function searchableAs()
    {
        return 'grade_categories_index';
    }
}
