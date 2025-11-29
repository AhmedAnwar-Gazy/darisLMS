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
 * Model Folder
 * each record is one folder resource
 */
class Folder extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'folder';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'revision' => 'integer',
        'timemodified' => 'integer',
        'display' => 'integer',
        'showexpanded' => 'boolean',
        'showdownloadfolder' => 'boolean',
        'forcedownload' => 'boolean',
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
            'revision' => (int)$this->revision,
            'timemodified' => (int)$this->timemodified,
            'display' => (int)$this->display,
            'showexpanded' => (int)$this->showexpanded,
            'showdownloadfolder' => (int)$this->showdownloadfolder,
            'forcedownload' => (int)$this->forcedownload,
        ];
    }

    public function searchableAs()
    {
        return 'folder_index';
    }
}
