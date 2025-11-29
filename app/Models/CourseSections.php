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
 * Model CourseSections
 * to define the sections for each course
 */
class CourseSections extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'course_sections';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'section' => 'integer',
        'name' => 'string',
        'summary' => 'string',
        'summaryformat' => 'integer',
        'sequence' => 'string',
        'visible' => 'boolean',
        'availability' => 'string',
        'timemodified' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'section' => (int)$this->section,
            'name' => (string)$this->name,
            'summary' => (string)$this->summary,
            'summaryformat' => (int)$this->summaryformat,
            'sequence' => (string)$this->sequence,
            'visible' => (int)$this->visible,
            'availability' => (string)$this->availability,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'course_sections_index';
    }
}
