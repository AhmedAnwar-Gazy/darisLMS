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
 * Model SearchSimpledbIndex
 * search_simpledb table containing the index data.
 */
class SearchSimpledbIndex extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'search_simpledb_index';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'docid' => 'string',
        'itemid' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'contextid' => 'integer',
        'areaid' => 'string',
        'type' => 'boolean',
        'courseid' => 'integer',
        'owneruserid' => 'integer',
        'modified' => 'integer',
        'userid' => 'integer',
        'description1' => 'string',
        'description2' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'docid' => (string)$this->docid,
            'itemid' => (int)$this->itemid,
            'title' => (string)$this->title,
            'content' => (string)$this->content,
            'contextid' => (int)$this->contextid,
            'areaid' => (string)$this->areaid,
            'type' => (int)$this->type,
            'courseid' => (int)$this->courseid,
            'owneruserid' => (int)$this->owneruserid,
            'modified' => (int)$this->modified,
            'userid' => (int)$this->userid,
            'description1' => (string)$this->description1,
            'description2' => (string)$this->description2,
        ];
    }

    public function searchableAs()
    {
        return 'search_simpledb_index_index';
    }
}
