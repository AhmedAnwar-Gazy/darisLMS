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
 * Model CourseCompletionDefaults
 * Default settings for activities completion
 */
class CourseCompletionDefaults extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course_completion_defaults';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'module' => 'integer',
        'completion' => 'boolean',
        'completionview' => 'boolean',
        'completionusegrade' => 'boolean',
        'completionpassgrade' => 'boolean',
        'completionexpected' => 'integer',
        'customrules' => 'string',
    ];

    // Relationships: BelongsTo
    public function modules()
    {
        return $this->belongsTo(Modules::class, 'module');
    }

    public function courseRelation()
    {
        return $this->belongsTo(Course::class, 'course');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'module' => (int)$this->module,
            'completion' => (int)$this->completion,
            'completionview' => (int)$this->completionview,
            'completionusegrade' => (int)$this->completionusegrade,
            'completionpassgrade' => (int)$this->completionpassgrade,
            'completionexpected' => (int)$this->completionexpected,
            'customrules' => (string)$this->customrules,
        ];
    }

    public function searchableAs()
    {
        return 'course_completion_defaults_index';
    }
}
