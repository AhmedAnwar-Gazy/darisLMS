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
 * Model Wiki
 * Stores Wiki activity configuration
 */
class Wiki extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'wiki';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'firstpagetitle' => 'string',
        'wikimode' => 'string',
        'defaultformat' => 'string',
        'forceformat' => 'boolean',
        'editbegin' => 'integer',
        'editend' => 'integer',
    ];

    // Relationships: HasMany
    public function wikiSubwikiss()
    {
        return $this->hasMany(WikiSubwikis::class, 'wikiid');
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
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'firstpagetitle' => (string)$this->firstpagetitle,
            'wikimode' => (string)$this->wikimode,
            'defaultformat' => (string)$this->defaultformat,
            'forceformat' => (int)$this->forceformat,
            'editbegin' => (int)$this->editbegin,
            'editend' => (int)$this->editend,
        ];
    }

    public function searchableAs()
    {
        return 'wiki_index';
    }
}
