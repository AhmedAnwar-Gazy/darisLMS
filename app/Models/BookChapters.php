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
 * Model BookChapters
 * Defines book_chapters
 */
class BookChapters extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'book_chapters';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'bookid' => 'integer',
        'pagenum' => 'integer',
        'subchapter' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'contentformat' => 'integer',
        'hidden' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'importsrc' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'bookid' => (int)$this->bookid,
            'pagenum' => (int)$this->pagenum,
            'subchapter' => (int)$this->subchapter,
            'title' => (string)$this->title,
            'content' => (string)$this->content,
            'contentformat' => (int)$this->contentformat,
            'hidden' => (int)$this->hidden,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'importsrc' => (string)$this->importsrc,
        ];
    }

    public function searchableAs()
    {
        return 'book_chapters_index';
    }
}
