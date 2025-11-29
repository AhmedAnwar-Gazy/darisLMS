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
 * Model TinyAutosave
 * The content of the textarea saved during autosave operations
 */
class TinyAutosave extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tiny_autosave';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'elementid' => 'string',
        'contextid' => 'integer',
        'pagehash' => 'string',
        'userid' => 'integer',
        'drafttext' => 'string',
        'draftid' => 'integer',
        'pageinstance' => 'string',
        'timemodified' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'elementid' => (string)$this->elementid,
            'contextid' => (int)$this->contextid,
            'pagehash' => (string)$this->pagehash,
            'userid' => (int)$this->userid,
            'drafttext' => (string)$this->drafttext,
            'draftid' => (int)$this->draftid,
            'pageinstance' => (string)$this->pageinstance,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'tiny_autosave_index';
    }
}
