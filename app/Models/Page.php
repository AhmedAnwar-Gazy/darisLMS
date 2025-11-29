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
 * Model Page
 * Each record is one page and its config data
 */
class Page extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'page';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'content' => 'string',
        'contentformat' => 'integer',
        'legacyfiles' => 'integer',
        'legacyfileslast' => 'integer',
        'display' => 'integer',
        'displayoptions' => 'string',
        'revision' => 'integer',
        'timemodified' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'content' => (string)$this->content,
            'contentformat' => (int)$this->contentformat,
            'legacyfiles' => (int)$this->legacyfiles,
            'legacyfileslast' => (int)$this->legacyfileslast,
            'display' => (int)$this->display,
            'displayoptions' => (string)$this->displayoptions,
            'revision' => (int)$this->revision,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'page_index';
    }
}
