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
 * Model Book
 * Defines book
 */
class Book extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'book';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'numbering' => 'integer',
        'navstyle' => 'integer',
        'customtitles' => 'integer',
        'revision' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
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
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'numbering' => (int)$this->numbering,
            'navstyle' => (int)$this->navstyle,
            'customtitles' => (int)$this->customtitles,
            'revision' => (int)$this->revision,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'book_index';
    }
}
