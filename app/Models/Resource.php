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
 * Model Resource
 * Each record is one resource and its config data
 */
class Resource extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'resource';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'tobemigrated' => 'integer',
        'legacyfiles' => 'integer',
        'legacyfileslast' => 'integer',
        'display' => 'integer',
        'displayoptions' => 'string',
        'filterfiles' => 'integer',
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
            'tobemigrated' => (int)$this->tobemigrated,
            'legacyfiles' => (int)$this->legacyfiles,
            'legacyfileslast' => (int)$this->legacyfileslast,
            'display' => (int)$this->display,
            'displayoptions' => (string)$this->displayoptions,
            'filterfiles' => (int)$this->filterfiles,
            'revision' => (int)$this->revision,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'resource_index';
    }
}
