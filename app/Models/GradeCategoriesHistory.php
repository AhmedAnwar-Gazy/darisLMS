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
 * Model GradeCategoriesHistory
 * History of grade_categories
 */
class GradeCategoriesHistory extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'grade_categories_history';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'action' => 'integer',
        'oldid' => 'integer',
        'source' => 'string',
        'timemodified' => 'integer',
        'loggeduser' => 'integer',
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
        'aggregatesubcats' => 'boolean',
        'hidden' => 'integer',
    ];

    // Relationships: BelongsTo
    public function gradeCategories()
    {
        return $this->belongsTo(GradeCategories::class, 'oldid');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function gradeCategories()
    {
        return $this->belongsTo(GradeCategories::class, 'parent');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'loggeduser');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'action' => (int)$this->action,
            'oldid' => (int)$this->oldid,
            'source' => (string)$this->source,
            'timemodified' => (int)$this->timemodified,
            'loggeduser' => (int)$this->loggeduser,
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
            'aggregatesubcats' => (int)$this->aggregatesubcats,
            'hidden' => (int)$this->hidden,
        ];
    }

    public function searchableAs()
    {
        return 'grade_categories_history_index';
    }
}
