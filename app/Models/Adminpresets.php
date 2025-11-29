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
 * Model Adminpresets
 * Table to store presets data
 */
class Adminpresets extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'adminpresets';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'name' => 'string',
        'comments' => 'string',
        'site' => 'string',
        'author' => 'string',
        'moodleversion' => 'string',
        'moodlerelease' => 'string',
        'iscore' => 'boolean',
        'timecreated' => 'integer',
        'timeimported' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'name' => (string)$this->name,
            'comments' => (string)$this->comments,
            'site' => (string)$this->site,
            'author' => (string)$this->author,
            'moodleversion' => (string)$this->moodleversion,
            'moodlerelease' => (string)$this->moodlerelease,
            'iscore' => (int)$this->iscore,
            'timecreated' => (int)$this->timecreated,
            'timeimported' => (int)$this->timeimported,
        ];
    }

    public function searchableAs()
    {
        return 'adminpresets_index';
    }
}
